<?php

namespace Tests\DistanceCalculator;

use App\DistanceCalculator\Latitude;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    public function test_that_latitude_cannot_be_less_than_minus_180()
    {
        $this->expectException(InvalidArgumentException::class);
        Latitude::fromFloat(-90.01);
        $this->assertTrue(true);
    }

    public function test_that_latitude_cannot_be_greater_than_180()
    {
        $this->expectException(InvalidArgumentException::class);
        Latitude::fromFloat(90.01);
        $this->assertTrue(true);
    }
    public function test_that_latitude_can_be_created_when_value_in_range()
    {
        $latitude = Latitude::fromFloat(90.0);
        $this->assertEquals(90.0, $latitude->getValue());
    }
}
