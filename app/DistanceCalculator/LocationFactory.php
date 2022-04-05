<?php

namespace App\DistanceCalculator;

class LocationFactory
{
    /**
     * @param string $longitudeString
     * @param string $latitudeString
     * @return Location
     */
    public function createLocationFromStrings(string $longitudeString, string $latitudeString): Location
    {
        $longitude = Longitude::fromString($longitudeString);
        $latitude = Latitude::fromString($latitudeString);

        return Location::fromCoordinates($latitude, $longitude);
    }
}
