<?php
require 'vendor/autoload.php';
require 'log_init.php';
require 'DB.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0"/>
    <title>Kontaktformular</title>
    <link rel="stylesheet" href="../../../%23/style.css">
    <?php include 'navbar.php' ?>
</head>
<body>

<?php
$model = $_POST['model'];
$purchasingDate = $_POST['purchasingDate'];

$db = new DB('spritkosten', 'root', '', 'localhost');
$db->run('
                INSERT INTO car (
                    id,
                    model,
                    purchasingDate 
                ) VALUES (
                default,
                :model,
                :purchasingDate 
                )', [':model' => $model, ':purchasingDate' => $purchasingDate]);

echo '<h1 class="successMessage">Daten registriert!</h1>';

//Logging into log_file.log
$carCreatedLogger->pushHandler(new StreamHandler('log_file.log', Logger::INFO));
$carCreatedLogger->info('New car registered', ['car name' => $model]);?>
</body>
</html>

