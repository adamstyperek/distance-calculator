<?php

namespace App\DistanceCalculator;

use InvalidArgumentException;

class Longitude
{
    const MAX = 180.0;
    const MIN = -180.0;

    private function __construct(private float $value)
    {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException("Longitude value cannot be less than " . self::MIN);
        }
        if ($this->value > self::MAX) {
            throw new InvalidArgumentException("Longitude value cannot be greater than " . self::MAX);
        }
    }

    public static function fromFloat(float $value): self
    {
        return new self($value);
    }

    public function getValue(): float
    {
        return (float)$this->value;
    }

}
