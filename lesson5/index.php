<?php

require_once 'Engine.php';
require_once 'TransmissionAuto.php';
require_once 'TransmissionManual.php';
require_once 'Car.php';
require_once 'NIVA.php';
require_once 'Solaris.php';



$someAuto = new NIVA();
$someAuto->startCar();
$someAuto->move(20, 15, 'forward');
$someAuto->move(5, 33, 'forward');
$someAuto->move(10, 50, 'forward');
$someAuto->move(5, 70, 'forward');
$someAuto->move(20, 100, 'forward');
$someAuto->move(5, 200, 'forward');
$someAuto->move(1, 0, 'none');
$someAuto->move(5, 15, 'back');
$someAuto->stopCar();

$otherAuto = new Solaris();
$otherAuto->startCar();
$otherAuto->move(20, 15, 'forward');
$otherAuto->move(15, 12, 'back');
$otherAuto->move(1, 15, 'none');
$otherAuto->move(10, 15, 'forward');
$otherAuto->move(2, 0, 'none');
$otherAuto->move(5, 12, 'back');
$otherAuto->move(1, 15, 'none');
$otherAuto->move(20, 100, 'forward');
$otherAuto->move(5, 200, 'forward');
$otherAuto->stopCar();