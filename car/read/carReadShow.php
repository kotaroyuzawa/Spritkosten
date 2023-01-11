<?php
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
        <h1 class="title">Dienstwagen</h1>
        <?php
        $db = new DB('spritkosten', 'root', '', 'localhost');
        /**
         * @var PDOStatement $stmt
         */
        $stmt = $db->run('
            SELECT 
                id,
                model,
                purchasingDate,
                SUM(cost_sum) AS totalCost,
                SUM(performance_sum) AS totalPerformance 
            FROM car 
            LEFT JOIN tank ON car.id = tank.car_id
            GROUP BY id');
        $carData = $stmt->fetchAll();

        ?>
        <form id="formCenter" action="edit" method="post">
            <input type="submit" value="Daten ändern">
            <input type="submit" formaction="deleted" value="Daten löschen">
            <table>
                <thead>
                    <tr>
                        <th>Auswählen</th>
                        <th>Dienstwagen-ID</th>
                        <th>Modell</th>
                        <th>Kaufdatum</th>
                        <th>Gesamte Kosten</th>
                        <th>Gesamte Fahrleistung</th>
                    </tr>
                </thead>

                <?php for ($i = 0; $i < count($carData); $i++){ ?>
                    <tr>
                        <td><input type="radio" name="car_id" value="<?php echo $carData[$i]['id'] ?>" required></td>
                        <td><?php echo $carData[$i]['id'];?></td>
                        <td><?php echo $carData[$i]['model'] ;?></td>
                        <td><?php echo $carData[$i]['purchasingDate'];?></td>
                        <td><?php echo number_format($carData[$i]['totalCost'] ?? 0.00, 2, ',', '.') . ' €' ;?></td>
                        <td><?php echo number_format($carData[$i]['totalPerformance'] ?? 0.00, 2, ',', '.') . ' km' ;?></td>
                    </tr>
                    <?php
                    } ?>
            </table>
        </form>
    </body>
</html>
