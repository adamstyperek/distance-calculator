<?php

namespace App\DistanceCalculator;

class HeversineDistanceCalculator implements DistanceCalculator
{

    const R = 6371000;

    public function calculateDistance(Location $fromLocation, Location $toLocation): Distance
    {
        $latitude1 = $fromLocation->getLatitudeValue();
        $latitude2 = $toLocation->getLatitudeValue();
        $longitude1 = $fromLocation->getLongitudeValue();
        $longitude2 = $toLocation->getLongitudeValue();

        $latitude1Radians = deg2rad($latitude1);
        $latitude2Radians = deg2rad($latitude2);
        $longitude1Radians = deg2rad($longitude1);
        $longitude2Radians = deg2rad($longitude2);

        $latitudeDelta = $latitude2Radians - $latitude1Radians;
        $longitudeDelta = $longitude2Radians - $longitude1Radians;

        $angle =
            2 * asin(
                sqrt(
                    pow(sin($latitudeDelta / 2), 2)
                    + cos($latitude1Radians)
                    * cos($latitude2Radians)
                    * pow(sin($longitudeDelta / 2), 2)
                )
            );
        $distanceInMeters = $angle * self::R;

        return Distance::fromMeters($distanceInMeters);
    }
}
