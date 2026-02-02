<?php

declare(strict_types=1);

/**
 * IRobot - единый интерфейс для всех роботов.
 * Позволяет MergeRobot работать с любым роботом единообразно (полиморфизм).
 */
interface IRobot
{
    public function getType(): string;
    public function getWeight(): float;
    public function getSpeed(): float;
    public function getHeight(): float;
}
