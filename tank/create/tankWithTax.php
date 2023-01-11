<?php
include "calculation.php";
require  'vendor/autoload.php';
require 'DB.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten registriert ansehen</title>

        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <diV class="calcDiv">
            <table class="calcTable">
                <h1>Ihre Kraftstoffrechnung</h1>
                <tr>
                    <td>Dienstwagen-ID</td>
                    <td align="right"><?php echo $carId ;?></td>
                </tr>
                <tr>
                    <td>Fahrer-ID</td>
                    <td align="right"><?php echo $driverId ;?></td>
                </tr>
                <tr>
                    <td>Ihre Fahrleistung</td>
                    <td align="right"><?php echo $performanceData;?></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><?php echo "Ihre Kraftstoffkosten für $amountSum Liter $fuelType"; ?></td>
                    <td align="right"><?php echo $costSum . " €"; ?></td>
                </tr>
                <tr>
                    <td>19,0% MwsT</td>
                    <td align="right"><?php echo $mwstSum . " €"; ?></td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td align="right"><?php echo $nettoSum. " €"; ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><?php echo "Durchschnittsbetrag für $fuelType pro Liter"; ?></td>
                    <td align="right"><?php echo $averagePrice . " €/L"; ?></td>
                </tr>
                <tr>
                    <td>19,0% MwsT</td>
                    <td align="right"><?php echo $mwstOnAverage . " €/L"; ?></td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td align="right"><?php echo $nettoOnAverage . " €/L"; ?></td>
                </tr>
            </table>
        </diV>
    </body>
</html>
<?php
$db = new DB('spritkosten', 'root', '', 'localhost');

$stmt = $db->run('
    INSERT INTO tank (
        tank_id,
        car_id,
        driver_id,
        fuel_type,
        amount_sum,
        cost_sum,
        performance_sum,
        date
    ) VALUES (
        default,
        :carId,
        :driverId,
        :fuelType,
        :amountSum,
        :costSum,
        :performanceSum,
        default
    )', [':carId' => $carId, ':driverId' => $driverId, ':fuelType' => $fuelType,
    ':amountSum' => $amountSum, ':costSum' => $costSum, 'performanceSum' => $performanceSum]);

$tankIdFetchStmt = $db->run('
    SELECT tank_id FROM tank ORDER BY tank_id'
);

$tankIdData = $tankIdFetchStmt->fetchAll(PDO::FETCH_COLUMN);

//Logging into log_file.log
$tankCreatedLogger->pushHandler(new StreamHandler('../../log_file.log', Logger::INFO));
$tankCreatedLogger->info('New tank data registered', ['tank id' => array_reverse($tankIdData)[0]]);

?>
