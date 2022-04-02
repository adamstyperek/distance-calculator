<?php

namespace App\DistanceCalculator;

interface DistanceCalculator
{
    public function calculateDistance(Location $fromLocation, Location $toLocation): Distance;
}
