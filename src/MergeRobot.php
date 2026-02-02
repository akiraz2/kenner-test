<?php

declare(strict_types=1);

/**
 * MergeRobot - Composite: объединяет несколько IRobot в один.
 * - Скорость = min (ограничение самого медленного)
 * - Вес/высота = sum (сумма всех компонентов)
 */
class MergeRobot implements IMergeRobot
{
    /** Для автогенерации уникальных типов */
    private static int $instanceCounter = 0;

    /** @var array<int, IRobot> */
    private array $robots = [];

    public function __construct(
        private ?string $type = null,
    ) {
        if ($this->type === null) {
            self::$instanceCounter++;
            $this->type = 'merge_robot_' . self::$instanceCounter;
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function addRobot(IRobot|array $robots): void
    {
        foreach (is_array($robots) ? $robots : [$robots] as $robot) {
            $this->robots[] = $robot;
        }
    }

    public function getWeight(): float
    {
        return $this->sumProperty('getWeight');
    }

    public function getSpeed(): float
    {
        if ($this->robots === []) {
            return 0.0;
        }

        return (float) min(array_map(
            static fn(IRobot $robot): float => $robot->getSpeed(),
            $this->robots,
        ));
    }

    public function getHeight(): float
    {
        return $this->sumProperty('getHeight');
    }

    private function sumProperty(string $methodName): float
    {
        $sum = 0.0;
        foreach ($this->robots as $robot) {
            $sum += $robot->$methodName();
        }
        return $sum;
    }

    /** @return array<int, IRobot> */
    public function getRobots(): array
    {
        return $this->robots;
    }

    public function getRobotsCount(): int
    {
        return count($this->robots);
    }
}
