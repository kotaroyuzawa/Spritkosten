<?php

class InitDB{
    private PDO $conn;


    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=spritkosten', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function getTankData (){
        $tankDataSql = 'SELECT tank_id FROM tank';
        return $this->conn->query($tankDataSql);
    }

    public function getCarData (){
        $carDataSql = 'SELECT id, model FROM car';
        return $this->conn->query($carDataSql);
    }

    public function getDriverData(){
        $driverDataSql = 'SELECT id, firstname, lastname, age FROM driver';
        return $this->conn->query($driverDataSql);


    }
}


try {
    $conn = new PDO('mysql:host=localhost;dbname=spritkosten', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tankDataSql = 'SELECT tank_id FROM tank';
    $tankData = $conn->query($tankDataSql);

    $carDataSql = 'SELECT id, model FROM car';
    $carData = $conn->query($carDataSql);

    $driverDataSql = 'SELECT id, lastname FROM driver';
    $driverData = $conn->query($driverDataSql);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;



