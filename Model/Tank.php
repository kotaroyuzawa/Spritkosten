<?php
declare(strict_types=1);

class Tank
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //tankSearch
    public function getTankIdQuery(): array
    {
        $this->db->query('SELECT tank_id FROM tank');

        return $this->db->resultSet();
    }

    public function getCarModelQuery(): array
    {
        $this->db->query('SELECT id, model FROM car');

        return $this->db->resultSet();
    }

    public function getDriverNameQuery(): array
    {
        $this->db->query('SELECT id, firstname, lastname, age FROM driver');

        return $this->db->resultSet();
    }

    //tankShow
    public function getTankQuery(): array
    {
        if (!empty($_POST['driver_id'])) {
            $driverId = $_POST['driver_id'];
            $tankId = null;
            $carId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['tank_id'])) {
            $tankId = $_POST['tank_id'];
            $carId = null;
            $driverId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['car_id'])) {
            $carId = $_POST['car_id'];
            $tankId = null;
            $driverId = null;
            $dateStart = null;
            $dateEnd = null;
        } else if (!empty($_POST['date_start']) || !empty($_POST['date_end'])) {
            $dateStart = $_POST['date_start'];
            $dateEnd = $_POST['date_end'];
            $driverId = null;
            $tankId = null;
            $carId = null;
        }

        if (isset($_POST['view_all'])) {
            $this->db->query('SELECT * FROM tank');

            return $this->db->resultSet();;
        } else {
            $this->db->query('
                SELECT  
                    tank_id,
                    car_id,
                    driver_id,
                    fuel_type,
                    amount_sum,
                    cost_sum,
                    performance_sum,
                    date
                FROM tank 
                WHERE 
                    tank_id = ? OR
                    car_id = ? OR
                    driver_id = ? OR 
                    date 
                BETWEEN ? AND ?');
            $this->db->bind(1, $tankId, PDO::PARAM_INT);
            $this->db->bind(2, $carId, PDO::PARAM_INT);
            $this->db->bind(3, $driverId, PDO::PARAM_INT);
            $this->db->bind(4, $dateStart, PDO::PARAM_STR);
            $this->db->bind(5, $dateEnd, PDO::PARAM_STR);
            $this->db->execute();

            return $this->db->resultSet();
        }
    }

    public function tankResultQuery($tankData): void
    {
        //Tankdaten eintragen
        if (!isset($tankData['tankId'])) {
            $this->db->query('
                INSERT INTO tank (
                    tank_id,
                    car_id,
                    driver_id,
                    fuel_type,
                    amount_sum,
                    cost_sum,
                    performance_sum,
                        date
                    ) VALUES (
                        default,
                        :carId,
                        :driverId,
                        :fuelType,
                        :amountSum,
                        :costSum,
                         :performanceSum,
                        default
                    )');

            $this->db->bind(':carId', $tankData['carId'], PDO::PARAM_INT);
            $this->db->bind(':driverId', $tankData['driverId'], PDO::PARAM_INT);
            $this->db->bind(':fuelType', $tankData['fuelType'], PDO::PARAM_STR);
            $this->db->bind(':amountSum', $tankData['amountSum'], PDO::PARAM_STR);
            $this->db->bind(':costSum', $tankData['costSum'], PDO::PARAM_STR);
            $this->db->bind(':performanceSum', $tankData['performanceSum'], PDO::PARAM_STR);
            $this->db->execute();
        } else {

            //Tankdaten updaten
                $this->db->query('
                UPDATE tank 
                SET
                    tank_id = :tankId,
                    car_id = :carId,
                    driver_id = :driverId,
                    fuel_type = :fuelType,
                    amount_sum = :amountSum,
                    cost_sum = :costSum,
                    performance_sum = :performanceSum,
                    date = :date
                    WHERE tank_id = :tankId
                  ');

                $this->db->bind(':tankId', $tankData['tankId'], PDO::PARAM_INT);
                $this->db->bind(':carId', $tankData['carId'], PDO::PARAM_INT);
                $this->db->bind(':driverId', $tankData['driverId'], PDO::PARAM_INT);
                $this->db->bind(':fuelType', $tankData['fuelType'], PDO::PARAM_STR);
                $this->db->bind(':amountSum', $tankData['amountSum'], PDO::PARAM_STR);
                $this->db->bind(':costSum', $tankData['costSum'], PDO::PARAM_STR);
                $this->db->bind(':performanceSum', $tankData['performanceSum'], PDO::PARAM_STR);
                $this->db->bind(':date', $tankData['date'], PDO::PARAM_STR);
                $this->db->execute();
        }
    }


    public function tankDeleteQuery(): void
    {
        $tankId = $_POST['tank_id'];
        $this->db->query('DELETE FROM tank WHERE tank_id = ?');
        $this->db->bind(1, $tankId, PDO::PARAM_INT);
        $this->db->execute();
    }
}
