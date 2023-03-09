<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

    <form id="formCenter" action="carUpdated" method="post">
        <h1>Dienstwage updaten</h1><br>
        <span>Dienstwagen-ID (nicht änderbar)</span><br>
        <input name="car_id" id="car_id" value="<?php echo $data?>" readonly><br><br>
        <label for="model">Modell</label><br>
        <input type="text" name="model" required maxlength="15"><br><br>
        <label for="purchasingDate">Kaufdatum</label><br>
        <input type="date" name="purchasingDate" required><br><br>
        <input type="submit" value="Registrieren">
    </form>
<?php include 'views/inc/footer.php'; ?>