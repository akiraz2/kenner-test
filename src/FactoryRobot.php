<?php

declare(strict_types=1);

/**
 * FactoryRobot - создает роботов по типу через клонирование прототипа.
 * Идентификация по getType() вместо class name: позволяет создавать типы динамически.
 */
class FactoryRobot
{
    /** type => prototype */
    private array $types = [];

    public function addType(IRobot $robot): void
    {
        $this->types[$robot->getType()] = $robot;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param positive-int $count
     * @return array<int, IRobot>
     */
    public function create(string $type, int $count = 1): array
    {
        if ($count <= 0) {
            throw new \InvalidArgumentException('Count must be positive');
        }

        $prototype = $this->types[$type]
            ?? throw new NotSupportedRobotException("Type '$type' not registered");

        return $this->cloneRobot($prototype, $count);
    }

    /**
     * @param positive-int $count
     * @return array<int, IRobot>
     */
    private function cloneRobot(IRobot $prototype, int $count): array
    {
        $robots = [];
        for ($i = 0; $i < $count; $i++) {
            $robots[] = clone $prototype;
        }
        return $robots;
    }
}
