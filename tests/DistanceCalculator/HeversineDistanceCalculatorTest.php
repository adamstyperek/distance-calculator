<?php

namespace Tests\DistanceCalculator;

use App\DistanceCalculator\HeversineDistanceCalculator;
use App\DistanceCalculator\Latitude;
use App\DistanceCalculator\Location;
use App\DistanceCalculator\Longitude;
use PHPUnit\Framework\TestCase;

class HeversineDistanceCalculatorTest extends TestCase
{
    public function test_that_calculator_returns_a_expected_distance_for_given_location()
    {
        $fromLatitude = Latitude::fromFloat(50.066389);
        $fromLongitude = Longitude::fromFloat(-5.714722);
        $fromLocation = Location::fromCoordinates($fromLatitude, $fromLongitude);

        $toLatitude = Latitude::fromFloat(58.643889);
        $toLongitude = Longitude::fromFloat(-3.07);
        $toLocation = Location::fromCoordinates($toLatitude, $toLongitude);

        $calculator = new HeversineDistanceCalculator();
        $distance = $calculator->calculateDistance($fromLocation, $toLocation);
        $this->assertEquals(968.9, $distance->toKilometers(1));
    }
}
