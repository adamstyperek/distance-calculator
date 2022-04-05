<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *  @OA\Info(
 *      title="Distance Calculator API",
 *      version="1.0.0",
 *      description="API documentation for Distance Calculator",
 *      @OA\Contact(
 *          email="adamstyperek@gmail.com"
 *      )
 *  ),
 *  @OA\Server(
 *      description="Returns App API",
 *      url="https://localhost:8000/"
 *  ),
 *  @OA\PathItem(
 *      path="/"
 *  )
 * )
 */
class Controller extends BaseController
{
    //Oa
}
