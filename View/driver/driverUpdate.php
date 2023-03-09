<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>


    <form id="formCenter" action="driverUpdated" method="post">
        <h1>Fahrer updaten</h1><br>
        <span>Faher-ID (nicht änderbar): </span><br>
        <input name="driver_id" id="driver_id" value="<?php echo $data;?>" readonly><br><br>
        <label for="firstname">Vorname: </label><br>
        <input type="text" name="firstname" id="firstname" required maxlength="15"><br><br>
        <label for="lastname">Nachname: </label><br>
        <input type="text" name="lastname" id="lastname" required maxlength="15"><br><br>
        <label for="age">Alter: </label><br>
        <input type="number" name="age" id="age" required max="100" min="18"><br><br>
        <input type="submit" value="Daten ändern">
    </form>
<?php include 'views/inc/footer.php'; ?>