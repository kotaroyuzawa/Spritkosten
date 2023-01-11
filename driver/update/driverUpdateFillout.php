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
        $driverId = $_POST['driver_id'];
        ?>

        <form id="formCenter" action="edited" method="post">
            <h1>Fahrer updaten</h1><br>
            <span>Faher-ID (nicht änderbar): </span><br>
            <input name="driver_id" id="driver_id" value="<?php echo $driverId?>" readonly><br><br>
            <label for="firstname">Vorname: </label><br>
            <input type="text" name="firstname" id="firstname" required maxlength="15"><br><br>
            <label for="lastname">Nachname: </label><br>
            <input type="text" name="lastname" id="lastname" required maxlength="15"><br><br>
            <label for="age">Alter: </label><br>
            <input type="number" name="age" id="age" required max="100" min="18"><br><br>
            <input type="submit" value="Daten ändern">
        </form>
    </body>
</html>