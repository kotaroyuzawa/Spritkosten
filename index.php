<?php
//require 'vendor/autoload.php';
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

$init = new Core();