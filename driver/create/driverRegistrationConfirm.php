<?php
require '../../vendor/autoload.php';
require '../../log_init.php';
require '../../DB.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0"/>
    <title>Kontaktformular</title>
    <link rel="stylesheet" href="../../../%23/style.css">
    <?php include '../../navbar.php' ?>
</head>
<body>

<?php
  $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $db = new DB('spritkosten', 'root', '', 'localhost');

        $db->run('
            INSERT INTO driver (
                 id,
                 firstname,
                 lastname,
                 age
            ) VALUES (
                  default,
                  :firstname,
                  :lastname,
                  :age
            )', [':firstname' => $firstname, ':lastname' => $lastname, ':age' => $age]);

        echo '<h1 class="successMessage">Daten registriert!</h1>';

//Logging into log_file.log
        $driverCreatedLogger->pushHandler(new StreamHandler('log_file.log', Logger::INFO));
        $driverCreatedLogger->info('New driver registered', ['driver name' => $firstname . $lastname]);

?>
</body>
</html>


