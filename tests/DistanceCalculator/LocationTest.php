<?php

namespace Tests\DistanceCalculator;

use App\DistanceCalculator\HeversineDistanceCalculator;
use App\DistanceCalculator\Latitude;
use App\DistanceCalculator\Location;
use App\DistanceCalculator\Longitude;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{

    public function testGetDistanceTo()
    {
        $fromLatitude = Latitude::fromFloat(50.066389);
        $fromLongitude = Longitude::fromFloat(-5.714722);
        $fromLocation = Location::fromCoordinates($fromLatitude, $fromLongitude);

        $toLatitude = Latitude::fromFloat(58.643889);
        $toLongitude = Longitude::fromFloat(-3.07);
        $toLocation = Location::fromCoordinates($toLatitude, $toLongitude);

        $calculator = new HeversineDistanceCalculator();
        $distance = $fromLocation->getDistanceTo($toLocation, $calculator);
        $this->assertEquals(968.9, $distance->toKilometers(1));
    }

    public function testGetDistanceFrom()
    {
        $fromLatitude = Latitude::fromFloat(50.066389);
        $fromLongitude = Longitude::fromFloat(-5.714722);
        $fromLocation = Location::fromCoordinates($fromLatitude, $fromLongitude);

        $toLatitude = Latitude::fromFloat(58.643889);
        $toLongitude = Longitude::fromFloat(-3.07);
        $toLocation = Location::fromCoordinates($toLatitude, $toLongitude);

        $calculator = new HeversineDistanceCalculator();
        $distance = $toLocation->getDistanceFrom($fromLocation, $calculator);
        $this->assertEquals(968.9, $distance->toKilometers(1));
    }

    public function testFromCoordinates()
    {
        $fromLatitude = Latitude::fromFloat(50.066389);
        $fromLongitude = Longitude::fromFloat(-5.714722);
        $fromLocation = Location::fromCoordinates($fromLatitude, $fromLongitude);
        $this->assertEquals(-5.714722, $fromLocation->getLongitudeValue());
        $this->assertEquals(50.066389, $fromLocation->getLatitudeValue());
    }
}
