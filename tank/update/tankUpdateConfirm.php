<?php include 'updateCalculation.php';
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
 $db = new DB('spritkosten', 'root', '', 'localhost');
        $db->run('
            UPDATE tank 
            SET 
                tank_id = ?,
                car_id = ?,
                driver_id = ?,
                fuel_type = ?,
                amount_sum = ?,
                cost_sum = ?,
                performance_sum = ?,
                date = ? 
            WHERE tank_id = ?', [$tankId, $carId, $driverId, $fuelType, $amountSum, $costSum, $performanceSum, $date, $tankId]);
        echo '<h1 class="title">Tankdaten updated!</h1>';
//Logging into log_file.log
        $tankUpdatedLogger->pushHandler(new StreamHandler('../../log_file.log'));
        $tankUpdatedLogger->info('Tank data updated', ['Tank id' => $tankId]);

?>
</body>
</html>

