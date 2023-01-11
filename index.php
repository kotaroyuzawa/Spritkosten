<?php
require 'Route.php';

//index.php file


//Route instance
$route = new Route();

//route address and home.php file location
$route->add("/", "index.html");
$route->add("/home", "index.html");

$route->add("/tank/search", "tank/read/tankReadSearch.php");
$route->add("/tank/show", "tank/read/tankReadShow.php");
$route->add("/tank/register", "tank/create/index.php");
$route->add("/tank/registered", "tank/create/tankWithTax.php");
$route->add("/tank/edit", "tank/update/tankUpdateFillout.php");
$route->add("/tank/edited", "tank/update/tankUpdateConfirm.php");
$route->add("/tank/deleted", "tank/delete/tankDeleteConfirm.php");


$route->add("/car/show", "/car/read/carReadShow.php");
$route->add("/car/register", "car/create/carRegistration.php");
$route->add("/car/registered", "car/create/carRegistrationConfirm.php");
$route->add("/car/edit", "car/update/carUpdateFillout.php");
$route->add("/car/edited", "car/update/carUpdateConfirm.php");
$route->add("/car/deleted", "car/delete/carDeleteConfirm.php");

$route->add("/driver/show", "driver/read/driverReadShow.php");
$route->add("/driver/register", "driver/create/driverRegistration.php");
$route->add("/driver/registered", "driver/create/driverRegistrationConfirm.php");
$route->add("/driver/edit", "driver/update/driverUpdateFillout.php");
$route->add("/driver/edited", "driver/update/driverUpdateConfirm.php");
$route->add("/driver/deleted", "driver/delete/driverDeleteConfirm.php");

