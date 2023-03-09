<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>
<h1 class="title">Wagen Registrieren</h1>
<form id="formCenter" action="carAdded" method="post">
    <label for="model">Modell</label><br>
    <input type="text" name="model" id="model" required maxlength="15"><br><br>
    <label for="purchasingDate">Kaufdatum</label><br>
    <input type="date" name="purchasingDate" id="purchasingDate" required><br><br>
    <input type="submit" name="submit" value="Registrieren">
</form>
<?php include 'views/inc/footer.php'; ?>




