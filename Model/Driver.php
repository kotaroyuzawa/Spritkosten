<?php
declare(strict_types=1);

class Driver
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDriverAll(): array
    {
        $this->db->query('
            SELECT
                id,
                firstname,
                lastname,
                age,
                SUM(cost_sum) AS totalCost,
                SUM(performance_sum) AS totalPerformance
            FROM driver
            LEFT JOIN tank ON driver.id = tank.driver_id 
            GROUP BY id');

        return $this->db->resultSet();
    }

    public function driverAddQuery($firstname, $lastname, $age): void
    {
        $this->db->query('
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
                )');
        $this->db->bind(':firstname', $firstname, PDO::PARAM_STR_CHAR);
        $this->db->bind(':lastname', $lastname, PDO::PARAM_STR_CHAR);
        $this->db->bind(':age', $age, PDO::PARAM_INT);
        $this->db->execute();
    }

    public function driverUpdateQuery($driverId, $firstname, $lastname, $age): void
    {
        $this->db->query('
        UPDATE driver 
        SET id = :id,
            firstname = :firstname,
            lastname = :lastname,
            age = :age 
        WHERE id = :id
        ');

        $this->db->bind(':id', $driverId, PDO::PARAM_INT);
        $this->db->bind(':firstname', $firstname, PDO::PARAM_STR_CHAR);
        $this->db->bind(':lastname', $lastname, PDO::PARAM_STR_CHAR);
        $this->db->bind(':age', $age, PDO::PARAM_INT);
        $this->db->execute();
    }

    public function driverDeleteQuery(): void
    {
            $driverId = $_POST['driver_id'];
            $this->db->query('DELETE FROM driver WHERE id = ?');
            $this->db->bind(1, $driverId, PDO::PARAM_INT);
            $this->db->execute();
    }
}