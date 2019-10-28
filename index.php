<?php
include __DIR__.'/uploader.php';

use Tasty_Juices\Factory;

$factory = new Factory;
$factory->unloadTruck(['banana'=>6000, 'apple'=>1000, 'pineapple' => 3000]);
$factory->unloadTruck(['cherry'=>2000, 'apple'=>1000]);
$factory->unloadTruck(['apricot'=>2000, 'apple'=>1000]);
$factory->unloadTruck(['mango'=>4000, 'melon'=>2000]);
$factory->unloadTruck(['apple'=>5000]);
$factory->info();
$line1 = $factory->runLine(1, 'small', 'banana');
$factory->info();
$line2 = $factory->runLine(1, 'small', 'banana');
$factory->stopLine($line1);
$factory->info();
$line4 = $factory->runLine(1, 'small', 'sun365');
$line3 = $factory->runLine(1, 'big', 'apple_cherry');
$factory->info();
$factory->stopLine($line3);
$factory->info();
$factory->stopLine($line1);
$factory->stopLine($line2);

$factory->loadTruck(9000);
$factory->info();

$factory->loadTruck(1000);
$factory->info();
