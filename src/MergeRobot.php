<?php

/**
 * Class MergeRobot
 */
class MergeRobot implements IRobot
{
    /**
     * @var array
     */
    protected $robots = [];

    public function addRobot($robots)
    {
        $robotsToAdd = !is_array($robots) ? [$robots] : $robots;
        array_push($this->robots, ...$robotsToAdd);
    }

    public function getWeight()
    {
        return $this->sumPropertyOfRobots('Weight');
    }

    public function getSpeed()
    {
        return min(array_map(function ($robot) {
            return $robot->getSpeed();
        }, $this->robots));
    }

    public function getHeight()
    {
        return array_sum(array_map(function ($robot) {
            return $robot->getHeight();
        }, $this->robots));
    }

    /**
     * Это работает быстрее, чем мап + сум
     * @param $property
     * @return int
     */
    protected function sumPropertyOfRobots($property): int
    {
        $sum = 0;
        foreach ($this->robots as $robot) {
            $sum += $robot->{'get' . $property}();
        }
        return $sum;
    }

    public function getRobots(): array
    {
        return $this->robots;
    }

    public function getRobotsCount(): int
    {
        return count($this->robots);
    }
}