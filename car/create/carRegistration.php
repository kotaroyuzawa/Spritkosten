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
        <h1 class="title">Wagen Registrieren</h1>
        <form id="formCenter" action="registered" method="post">
            <label for="model">Modell</label><br>
            <input type="text" name="model" id="model" required maxlength="15"><br><br>
            <label for="purchasingDate">Kaufdatum</label><br>
            <input type="date" name="purchasingDate" id="purchasingDate" required><br><br>
            <input type="submit" value="Registrieren">
        </form>
    </body>
</html>