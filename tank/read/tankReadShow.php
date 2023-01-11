<?php
require 'DB.php';
?>
<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten ansehen</title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <style>
            #formCenter {
                background-color: transparent;
            }
        </style>
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <?php

        if (!empty($_POST['driver_id'])) {
            $driverId = $_POST['driver_id'];
            $tankId = null;
            $carId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['tank_id'])) {
            $tankId = $_POST['tank_id'];
            $carId = null;
            $driverId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['car_id'])) {
            $carId = $_POST['car_id'];
            $tankId = null;
            $driverId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['date_start']) || !empty($_POST['date_end'])) {
            $dateStart = $_POST['date_start'];
            $dateEnd = $_POST['date_end'];
            $driverId = null;
            $tankId = null;
            $carId = null;
        }

        $db = new DB('spritkosten', 'root', '', 'localhost');

        if (isset($_POST['view_all'])) {
            /**
             * @var PDOStatement $stmt
             */
            $stmt = $db->run('SELECT * FROM tank');
            $tankData = $stmt->fetchAll();
        } else {
            $stmt = $db->run('
                SELECT  
                    tank_id,
                    car_id,
                    driver_id,
                    fuel_type,
                    amount_sum,
                    cost_sum,
                    performance_sum,
                    date
                FROM tank 
                WHERE 
                    tank_id = ? OR
                    car_id = ? OR
                    driver_id = ? OR 
                    date 
                BETWEEN ? AND ?', [$tankId, $carId, $driverId, $dateStart, $dateEnd]);

            $tankData = $stmt->fetchAll();
        }

        ?>


        <form id="formCenter" action="edit" method="post">
            <input type="submit" value="Daten ändern">
            <input type="submit" formaction="../delete/tankDeleteConfirm.php" value="Daten löschen">

            <table>
                <thead>
                <tr>
                    <th>Auswählen</th>
                    <th>Tank-ID</th>
                    <th>Dienstwagen-ID</th>
                    <th>Fahrer-ID</th>
                    <th>Kraftstoffart</th>
                    <th>Tankmenge</th>
                    <th>Zahlbetrag</th>
                    <th>Fahrleistung</th>
                    <th>Datum</th>
                </tr>
                </thead>
                <?php foreach ($tankData as $row) : ?>
                    <tr>
                        <td><input type="radio" name="tank_id" value="<?php echo $row['tank_id'] ?>" required></td>
                        <td><?php echo ($row['tank_id']); ?></td>
                        <td><?php echo ($row['car_id']); ?></td>
                        <td><?php echo ($row['driver_id']); ?></td>
                        <td><?php echo ($row['fuel_type']); ?></td>
                        <td><?php echo number_format($row['amount_sum'], 2, ",", ".") . " L";?></td>
                        <td><?php echo number_format($row['cost_sum'], 2, ",", ".") . " €";?></td>
                        <td><?php echo number_format($row['performance_sum'], 2, ",", ".") . " km";?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php endforeach;?>
            </table>
        </form>
    </body>
</html>