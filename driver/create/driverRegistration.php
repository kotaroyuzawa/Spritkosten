<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faherer registrieren </title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <h1 class="title">Fahrer Registrieren</h1>
        <form id="formCenter" action="driverRegistrationConfirm.php" method="post">
            <label for="firstname">Vorname</label><br>
            <input type="text" name="firstname" id="firstname" required maxlength="20"><br>
            <label for="lastname">Nachname</label><br>
            <input type="text" name="lastname" id="lastname" required><br>
            <label for="age">Alter</label><br>
            <input type="number" name="age" id="age" required max="100" min="18"><br><br>
            <input type="submit" value="Registrieren">
        </form>
    </body>
</html>
