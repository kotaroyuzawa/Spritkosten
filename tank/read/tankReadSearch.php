<?php include 'init_database.php';
$conn = new InitDB();

?>


<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten-Auswahl zumn Ansehen </title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php';?>

    </head>
    <body>
        <h1 class="title">Tankdaten ansehen</h1>
        <form id="tankSearchForm" action="show" method="post">
            <span>Alle Daten ansehen</span>
            <button name="view_all" type="submit" >Alle Einträge ansehen</button>
        </form>
        <form id="tankSearchForm" action="show" method="post">
            <span>Tankdaten durch eine Tank-ID suchen</span>
            <select name="tank_id" id="tank_id">
                <?php
                $tankData = $conn->getTankData();
                $rows = $tankData->fetch(PDO::FETCH_ASSOC);
                while ($rows = $tankData->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo ($rows['tank_id']);?>" id="<?php echo ($rows['tank_id']);?>"><?php echo ($rows['tank_id']); ?></option>
                <?php
                }
                ?>
            </select><input type="submit" name="submit" value="Ansehen">
        </form>
        <form id="tankSearchForm" action="show" method="post">
            <span>Tankdaten durch einen Dienstwagen suchen</span>
            <select name="car_id" id="car_id">
                <?php
                $carData = $conn->getCarData();
                while ($rows = $carData->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo ($rows['id']);?>" id="<?php echo ($rows['id']);?>"><?php echo ($rows['model']); ?></option>
                <?php
                }
                ?>
            </select><input type="submit" name="submit" value="Ansehen">
        </form>
        <form id="tankSearchForm" action="show" method="post">
            <span>Tankdaten durch eine/n Fahrer/in suchen</span>
            <select name="driver_id" id="driver_id">
                <?php
                $driverData = $conn->getDriverData();
                while ($rows = $driverData->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo ($rows['id']);?>" id="<?php echo ($rows['id']);?>"><?php echo ($rows['lastname']); ?></option>
                <?php
                }
                ?>
            </select><input type="submit" name="submit" value="Ansehen">
        </form>
        <form id="tankSearchForm" action="show" method="post">
            <label for="date_start">von</label>
            <input type="date" name="date_start" id="date_start" required>
            <label for="date_end">bis</label>
            <input type="date" name="date_end" required>
            </select><input type="submit" name="submit" value="Ansehen">
        </form>
    </body>
</html>