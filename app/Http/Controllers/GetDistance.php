<?php

namespace App\Http\Controllers;

use App\DistanceCalculator\DistanceCalculator;
use App\DistanceCalculator\LocationFactory;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use OpenApi\Annotations\OpenApi as OA;

class GetDistance extends Controller
{

    private DistanceCalculator $distanceCalculator;
    private LocationFactory $locationFactory;

    /**
     * @param DistanceCalculator $distanceCalculator
     * @param LocationFactory $locationFactory
     */
    public function __construct(DistanceCalculator $distanceCalculator, LocationFactory $locationFactory)
    {
        $this->distanceCalculator = $distanceCalculator;
        $this->locationFactory = $locationFactory;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @OA\Get (
     *      path="/distance",
     *      operationId="getDistance",
     *      tags={"Distance"},
     *      summary="Get distance between two points",
     *      description="Returns distance between two points",
     *      @OA\Response(
     *          response=400,
     *          description="Bad request",
     *      ),
     *     @OA\Parameter (
     *      name="fromLongitude",
     *      in="query",
     *      description="from location logitude"
     *     )
     *     @OA\Parameter (
     *      name="fromLatitude",
     *      in="query",
     *      description="from location latitude"
     *     )
     *     @OA\Parameter (
     *      name="toLongitude",
     *      in="query",
     *      description="to location logitude"
     *     )
     *     @OA\Parameter (
     *      name="toLatitude",
     *      in="query",
     *      description="to location latitude"
     *     )
     * )
     *
     */
    public function calculate(Request $request)
    {
        try {
            $fromLongitude = $request->get('fromLongitude', '');
            $fromLatitude = $request->get('fromLatitude','');
            $toLongitude = $request->get('toLongitude', '');
            $toLatitude = $request->get('toLatitude', '');

            $fromLocation = $this->locationFactory->createLocationFromStrings($fromLongitude, $fromLatitude);
            $toLocation = $this->locationFactory->createLocationFromStrings($toLongitude, $toLatitude);

            $distance = $this->distanceCalculator->calculateDistance($fromLocation, $toLocation);
            return response($distance->toString(), HttpResponse::HTTP_OK);
        } catch (InvalidArgumentException $invalidArgumentException) {
            return response('Invalid parameters', HttpResponse::HTTP_BAD_REQUEST);
        }

    }
}
