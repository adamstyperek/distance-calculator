<?php

namespace Tests\DistanceCalculator;

use App\DistanceCalculator\Longitude;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    public function test_that_longitude_cannot_be_less_than_minus_180()
    {
        $this->expectException(InvalidArgumentException::class);
        Longitude::fromFloat(-180.01);
        $this->assertTrue(true);
    }

    public function test_that_longitude_cannot_be_greater_than_180()
    {
        $this->expectException(InvalidArgumentException::class);
        Longitude::fromFloat(180.01);
        $this->assertTrue(true);
    }
    public function test_that_longitude_can_be_created_when_value_in_range()
    {
        $longitude = Longitude::fromFloat(180.0);
        $this->assertEquals(180.0, $longitude->getValue());
    }
}
