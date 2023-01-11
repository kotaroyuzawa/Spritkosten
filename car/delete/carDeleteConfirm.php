<?php
require 'vendor/autoload.php';
require 'log_init.php';
require 'DB.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

    ;?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
        <link rel="stylesheet" href="../../../%23/style.css">
        <title>Dienstwagen gelöscht</title>
        <?php include 'navbar.php' ?>
    </head>
    <body>

    <?php
    $carId = $_REQUEST['car_id'];

    $db = new DB('spritkosten', 'root', '', 'localhost');
    /**
     * @var PDOStatement $stmt
     */
    $stmt = $db->run('SELECT model FROM car WHERE id = ?', [$carId]);
    $carName = $stmt->fetch();

    //Logging into log_file.log
    $carDeletedLogger->pushHandler(new StreamHandler('log_file.log'));
    $carDeletedLogger->info('car deleted', ['car name' => $carName['model']]);

    $db->run('DELETE FROM car WHERE id = ?', [$carId]);

    echo '<h1 class="successMessage">Dienstwagen-Daten gelöscht!</h1>';

    $conn = null;
        ?>
    </body>
</html>