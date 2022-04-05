<?php

namespace App\DistanceCalculator;

use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

class Distance
{

    private function __construct(private int $value)
    {
        if ($this->value < 0) {
            throw new InvalidArgumentException("Distance cannot be negative");
        }
    }

    public static function fromMeters(int $value): self
    {
        return new self($value);
    }

    public static function fromString(string $value): self
    {
        return new self((int)$value);
    }

    public static function fromMiles(float $value): self
    {
        return self::fromKilometers($value * 1.609344);
    }

    public static function fromKilometers(float $value): self
    {
        $meters = (int)($value * 1000);
        return new self($meters);
    }

    public function toString(): string
    {
        return number_format($this->value, 0, '.', '');
    }

    public function toKilometers(int $withPrecision): float
    {
        return round(($this->value / 1000), $withPrecision);
    }

    public function toMiles(int $withPrecision): float
    {
        return round(($this->value / 1000 / 1.609344), $withPrecision);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
