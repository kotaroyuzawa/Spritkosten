<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>
    <h1 class="title">Fahrer Registrieren</h1>
    <form id="formCenter" action="driverAdded" method="post">
        <label for="firstname">Vorname</label><br>
        <input type="text" name="firstname" id="firstname" required maxlength="20"><br>
        <label for="lastname">Nachname</label><br>
        <input type="text" name="lastname" id="lastname" required><br>
        <label for="age">Alter</label><br>
        <input type="number" name="age" id="age" required max="100" min="18"><br><br>
        <input type="submit" name="submit" value="Registrieren">
    </form>
<?php include 'views/inc/footer.php'; ?>