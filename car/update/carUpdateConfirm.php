<?php
require 'vendor/autoload.php';
require 'log_init.php';
require 'DB.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler; ?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tankdaten eintragen</title>
    <link rel="stylesheet" href="../../../%23/style.css">
    <?php include 'navbar.php' ?>
</head>
<body>
<?php


$carId = $_POST['car_id'];
$model = $_POST['model'];
$purchasingDate = $_POST['purchasingDate'];

$db = new DB('spritkosten', 'root', '', 'localhost');

$db->run('
        UPDATE car 
        SET id = ?,
            model = ?,
            purchasingDate = ? 
        WHERE id = ?', [$carId, $model, $purchasingDate, $carId]);
echo '<h1 class="title">Erfolgreich updated!</h1>';
//Logging into log_file.log
$carUpdatedLogger->pushHandler(new StreamHandler('log_file.log'));
$carUpdatedLogger->info('car updated', ['car model' => $model]);
?>
</body>
</html>



