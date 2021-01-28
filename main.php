<?php
include('src/FactoryRobot.php');
include('src/IRobot.php');
include('src/Robot1.php');
include('src/Robot2.php');
include('src/MergeRobot.php');
include('src/NotSupportedRobotException.php');

$factory = new FactoryRobot();
$factory->addType(new Robot1());
$factory->addType(new Robot2());

$mergeRobot = new MergeRobot();
$mergeRobot->addRobot(new Robot1());
$mergeRobot->addRobot($factory->createRobot2(2));
$factory->addType($mergeRobot);

$res = ($factory->createMergeRobot(1))[0];
var_dump($res->getWeight());
var_dump($res->getHeight());
var_dump($res->getSpeed());