<?php

declare(strict_types=1);

/**
 * Robot2 - конкретный тип робота с предустановленными характеристиками.
 */
readonly class Robot2 extends AbstractRobot
{
    public function __construct()
    {
        parent::__construct(
            type: 'robot2',
            weight: 12.0,
            speed: 102.0,
            height: 1002.0,
        );
    }
}
