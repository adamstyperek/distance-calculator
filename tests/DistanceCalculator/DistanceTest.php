<?php

namespace Tests\DistanceCalculator;

use App\DistanceCalculator\Distance;
use PHPUnit\Framework\TestCase;

class DistanceTest extends TestCase
{
    public function test_that_distance_cannot_be_negative()
    {
        $this->expectException(\InvalidArgumentException::class);
        Distance::fromMeters(-1);
        $this->assertTrue(true);
    }

    public function test_that_distance_can_be_created_from_meters()
    {
        $distance = Distance::fromMeters(100);
        $this->assertEquals(100, $distance->getValue());
    }

    public function test_that_distance_can_be_created_from_meters_in_string()
    {
        $distance = Distance::fromString('100');
        $this->assertEquals(100, $distance->getValue());
    }

    public function test_that_distance_can_be_created_from_kilometers()
    {
        $distance = Distance::fromKilometers(100);
        $this->assertEquals(100000, $distance->getValue());
    }

    public function test_that_distance_can_be_created_from_miles()
    {
        $distance = Distance::fromMiles(100);
        $this->assertEquals((int)(100000 * 1.609344), $distance->getValue());
    }

    public function test_that_distance_can_be_returned_in_miles_with_precision()
    {
        $distance = Distance::fromMiles(100.56);
        $this->assertEquals(100.56, $distance->toMiles(2));
    }

    public function test_that_distance_can_be_returned_in_kilometers_with_precision()
    {
        $distance = Distance::fromKilometers(100.563);
        $this->assertEquals(100.563, $distance->toKilometers(3));
    }

    public function test_that_distance_can_be_returned_in_string()
    {
        $distance = Distance::fromMeters(100);
        $this->assertEquals('100', $distance->toString());
    }
}
