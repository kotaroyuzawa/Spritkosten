<?php
require 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

//car/create/carRegistrationConfirm.php
$carCreatedLogger = new Logger('log');

//car/delete/carDeleteConfirm.php
$carDeletedLogger = new Logger('log');

//car/delete/carUpdateConfirm.php
$carUpdatedLogger = new Logger('log');

//driver/create/driverRegistrationConfirm.php
$driverCreatedLogger = new Logger('log');

//driver/delete/driverRegistrationConfirm.php
$driverDeletedLogger = new Logger('log');

//driver/update/driverUpdateConfirm.php
$driverUpdatedLogger = new Logger('log');

//
$pdoConnectionError = new Logger('log');

//tank/create/tankWithTax.php
$tankCreatedLogger = new Logger('log');

//tank/delete/tankDeleteConfirm.php
$tankDeletedLogger = new Logger('log');

//tank/update/tankUpdateConfirm.php
$tankUpdatedLogger = new Logger('log');