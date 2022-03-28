<?php

namespace App\DistanceCalculator;

use InvalidArgumentException;

class Latitude
{
    const MAX = 90.0;
    const MIN = -90.0;

    private function __construct(private float $value)
    {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException("Latitude value cannot be less than " . self::MIN);
        }
        if ($this->value > self::MAX) {
            throw new InvalidArgumentException("Latitude value cannot be greater than " . self::MAX);
        }
    }

    public static function fromFloat(float $value): self
    {
        return new self($value);
    }

    public static function fromString(string $value): self
    {
        return new self((string)$value);
    }

    public function getValue(): float
    {
        return (float)$this->value;
    }

    public function toString(): string
    {
        return (string)$this->value;
    }

}
