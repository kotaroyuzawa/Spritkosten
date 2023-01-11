<?php
require 'init_database.php';
require 'DB.php';
?>
<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten anzeigen</title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <h1 class="title">Fahrer</h1>
        <?php
        $db = new DB('spritkosten', 'root', '', 'localhost');

        /**
         * @var PDOStatment $stmt
         */
        $stmt = $db->run(
            $sql = '
            SELECT
                id,
                firstname,
                lastname,
                age,
                SUM(cost_sum) AS totalCost,
                SUM(performance_sum) AS totalPerformance
            FROM driver
            LEFT JOIN tank ON driver.id = tank.driver_id 
            GROUP BY id');
        $driverData = $stmt->fetchAll();
        ?>

        <form id="formCenter" action="edit" method="post">
            <input type="submit" value="Daten ändern">
            <input type="submit" formaction="deleted" value="Daten löschen">
            <table>
                <thead>
                    <tr>
                        <th>Auswählen</th>
                        <th>Fahrer-ID</th>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Alter</th>
                        <td>Gesamte Tankkosten</td>
                        <td>Gesamte Fahrleistung</td>
                    </tr>
                </thead>


                <?php
                for ($i = 0; $i < count($driverData); $i++) { ?>
                    <tr>
                        <td><input type="radio" name="driver_id" value="<?php echo $driverData[$i]['id'] ;?>" required></td>
                        <td><?php echo $driverData[$i]['id'] ;?></td>
                        <td><?php echo $driverData[$i]['firstname'] ;?></td>
                        <td><?php echo $driverData[$i]['lastname'] ;?></td>
                        <td><?php echo $driverData[$i]['age'] ;?></td>
                        <td><?php echo number_format($driverData[$i]['totalCost'] ?? 0.00, 2, ',', '.') . ' €' ; ?></td>
                        <td><?php echo number_format($driverData[$i]['totalPerformance'] ?? 0.00, 2, ',', '.') . ' km' ;?></td>
                    </tr>
                    <?php
                    } ?>
            </table>
        </form>
    </body>
</html>
