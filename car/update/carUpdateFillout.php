<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten </title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <?php
        $carId = $_POST['car_id'];
        ?>

        <form id="formCenter" action="edited" method="post">
            <h1>Dienstwage updaten</h1><br>
            <span>Dienstwagen-ID (nicht änderbar)</span><br>
            <input name="car_id" id="car_id" value="<?php echo $carId?>" readonly><br><br>
            <label for="model">Modell</label><br>
            <input type="text" name="model" required maxlength="15"><br><br>
            <label for="purchasingDate">Kaufdatum</label><br>
            <input type="date" name="purchasingDate" required><br><br>
            <input type="submit" value="Registrieren">
        </form>
    </body>
</html>