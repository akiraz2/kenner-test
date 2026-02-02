<?php

declare(strict_types=1);

/**
 * IMergeRobot - маркер-интерфейс для роботов, которые могут содержать других роботов.
 * Отделяет Composite (MergeRobot) от Leaf (обычные роботы) для type safety.
 */
interface IMergeRobot extends IRobot
{
    public function addRobot(IRobot|array $robots): void;
}
