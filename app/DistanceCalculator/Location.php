<?php

namespace App\DistanceCalculator;

class Location
{

    private function __construct(private Latitude $latitude, private Longitude $longitude)
    {
    }

    public static function fromCoordinates(Latitude $latitude, Longitude $longitude): self
    {
        return new self($latitude, $longitude);
    }

    public function getDistanceTo(Location $to, DistanceCalculator $distanceCalculator): Distance
    {
        return $distanceCalculator->calculateDistance($this, $to);
    }

    public function getDistanceFrom(Location $from, DistanceCalculator $distanceCalculator): Distance
    {
        return $distanceCalculator->calculateDistance($from, $this);
    }

    public function getLatitudeValue(): float
    {
        return $this->latitude->getValue();
    }

    public function getLongitudeValue(): float
    {
        return $this->longitude->getValue();
    }


}
