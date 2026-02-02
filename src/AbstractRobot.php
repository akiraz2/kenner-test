<?php

declare(strict_types=1);

/**
 * AbstractRobot - readonly базовый класс для всех роботов.
 * readonly: характеристики робота неизменны после создания (иммутабельность).
 */
abstract readonly class AbstractRobot implements IRobot
{
    public function __construct(
        protected string $type,
        protected float $weight,
        protected float $speed,
        protected float $height,
    ) {}

    public function getType(): string
    {
        return $this->type;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getSpeed(): float
    {
        return $this->speed;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}
