<?php

declare(strict_types=1);

// Автозагрузка классов (в реальном проекте лучше использовать autoload от composer)
require_once __DIR__ . '/src/IRobot.php';
require_once __DIR__ . '/src/IMergeRobot.php';
require_once __DIR__ . '/src/AbstractRobot.php';
require_once __DIR__ . '/src/NotSupportedRobotException.php';
require_once __DIR__ . '/src/Robot1.php';
require_once __DIR__ . '/src/Robot2.php';
require_once __DIR__ . '/src/MergeRobot.php';
require_once __DIR__ . '/src/FactoryRobot.php';

$factory = new FactoryRobot();
$factory->addType(new Robot1());
$factory->addType(new Robot2());

$robots1 = $factory->create('robot1', 5);
echo "Создано robot1: " . count($robots1) . " шт.\n";

$robots2 = $factory->create('robot2', 2);
echo "Создано robot2: " . count($robots2) . " шт.\n";

$mergeRobot2 = new MergeRobot('super_merge');
$mergeRobot2->addRobot(new Robot1());
$mergeRobot2->addRobot(new Robot2());
echo "MergeRobot2 тип: " . $mergeRobot2->getType() . "\n";
$factory->addType($mergeRobot2);

$superMerges = $factory->create('super_merge', 2);
echo "Создано super_merge: " . count($superMerges) . " шт.\n";
echo "Вес super_merge[0]: " . $superMerges[0]->getWeight() . " (10 + 12 = 22)\n";
