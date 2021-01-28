<?php

/**
 * Class FactoryRobot
 */
class FactoryRobot
{
    /**
     * @var array IRobot
     */
    protected $types = [];

    /**
     * @param $robot
     */
    public function addType(IRobot $robot)
    {
        array_push($this->types, ($robot));
    }

    /**
     *
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

//    public function createMergeRobot($count) {
//
//    }

    public function __call($name, $arguments)
    {
        if (substr($name, 0, 6) === 'create') {
            $robotName = substr($name, 6);
            $found = $this->findType($robotName);
            $count = +$arguments[0];
            if (!is_integer($count) || $count <= 0) {
                throw new InvalidArgumentException('Wrong count number');
            }
            return $this->cloneRobot($found, $count);
        }
    }

    /**
     * Just multi clone robot
     * @param $robot
     * @param $count
     * @return array
     */
    protected function cloneRobot($robot, $count)
    {
        $arrayRobots = [];
        for ($i = 0; $i < $count; $i++) {
            array_push($arrayRobots, clone $robot);
        }
        return $arrayRobots;
    }

    /**
     * Search Robot in our types
     * @param $robotName
     * @return mixed
     * @throws NotSupportedRobotException
     */
    protected function findType($robotName)
    {
        foreach ($this->types as $type) {
            if (get_class($type) === $robotName) {
                return $type;
            }
        }
        throw new NotSupportedRobotException();
    }
}