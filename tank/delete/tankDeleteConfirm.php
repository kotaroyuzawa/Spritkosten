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
        <meta name="viewport" content="width = device-width, initial-scale = 1.0" />
        <title>Tankdaten gelöscht</title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <?php
        $tankId = $_POST['tank_id'];

        if (!$tankId) {
            echo '<h1 class="title">Wählen Sie einen zu löschenden Kunden</h1><br>';
            exit();
        } else {

            $db = new DB('spritkosten', 'root', '', 'localhost');
            /**
             * @var
             */
            $stmt = $db->run('
                DELETE FROM tank 
                WHERE tank_id = :tank_id', [':tank_id' => $tankId]);

            echo '<h1 class="successMessage">Daten erfolgreich gelöscht!</h1>';
            //Logging into log_file.log
            $tankDeletedLogger->pushHandler(new StreamHandler('../../log_file.log', Logger::INFO));
            $tankDeletedLogger->info('Tank data delete', ['tank id' => $tankId]);
        }
        ?>
    </body>
</html>