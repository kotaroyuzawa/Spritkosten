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
 $driverId = $_POST['driver_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $db = new DB('spritkosten', 'root', '', 'localhost');

        $db->run('
        UPDATE driver 
        SET id = ?,
            lastname = ?,
            firstname = ?,
            age = ? 
        WHERE id = ?', [$driverId, $lastname, $firstname, $age, $driverId]);

        echo '<h1 class="title">Erfolgreich updated!</h1>';

//Logging into log_file.log
        $driverUpdatedLogger->pushHandler(new StreamHandler('log_file.log'));
        $driverUpdatedLogger->info('driver data updated', ['driver name' => $lastname]);


?>
</body>
</html>
