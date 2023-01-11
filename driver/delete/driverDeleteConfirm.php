<?php
require 'vendor/autoload.php';
require 'log_init.php';
require 'DB.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0"/>
    <link rel="stylesheet" href="../../../%23/style.css">
    <title>Dienstwagen gelöscht</title>
    <?php include 'navbar.php' ?>
</head>
<body>

<?php
$driverId = $_POST['driver_id'];

$db = new DB('spritkosten', 'root', '', 'localhost');
/**
 * @var PDOStatement $driverNameFetchStmt
 */
$driverNameFetchStmt = $db->run('SELECT lastname FROM driver WHERE id = :driver_id', [':driver_id' => $driverId]);
$driverName = $driverNameFetchStmt->fetch();

//Logging into log_file.php
$driverDeletedLogger->pushHandler(new StreamHandler('log_file.log'));
$driverDeletedLogger->info('driver deleted', ['driver name' => $driverName['lastname']]);

/**
 * @var PDOStatement $stmt
 */
$stmt = $db->run('DELETE FROM driver WHERE id = :driver_id', [':driver_id' => $driverId]);
echo '<h1 class="successMessage">Fahererdaten gelöscht!</h1>';
?>

</body>
</html>
