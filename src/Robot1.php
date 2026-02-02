<?php

declare(strict_types=1);

/**
 * Robot1 - конкретный тип робота с предустановленными характеристиками.
 */
readonly class Robot1 extends AbstractRobot
{
    public function __construct()
    {
        parent::__construct(
            type: 'robot1',
            weight: 10.0,
            speed: 104.0,
            height: 1000.0,
        );
    }
}
