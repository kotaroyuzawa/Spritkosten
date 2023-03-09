<?php
declare(strict_types=1);

class Car
{
    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCarAllQuery(): array
    {
        $this->db->query('
            SELECT 
                id,
                model,
                purchasingDate,
                SUM(cost_sum) AS totalCost,
                SUM(performance_sum) AS totalPerformance 
            FROM car 
            LEFT JOIN tank ON car.id = tank.car_id
            GROUP BY id');

        return $this->db->resultSet();
    }

    public function carAddQuery($model, $purchasingDate): void
    {
            $this->db->query('
                INSERT INTO car (
                    id,
                    model, 
                    purchasingDate 
                ) VALUES (
                default,
                :model,
                :purchasingDate 
                )');
            $this->db->bind(':model', $model, PDO::PARAM_STR_CHAR);
            $this->db->bind(':purchasingDate', $purchasingDate, PDO::PARAM_STR);
            $this->db->execute();
    }

    public function carUpdateQuery($carId, $model, $purchasingDate): void
    {
        $this->db->query('
                UPDATE car
                SET id = :id,
                    model = :model,
                    purchasingDate = :purchasingDate
                WHERE id = :id
                ');

        $this->db->bind(':id', $carId, PDO::PARAM_INT);
        $this->db->bind(':model', $model, PDO::PARAM_STR_CHAR);
        $this->db->bind(':purchasingDate', $purchasingDate, PDO::PARAM_STR);
        $this->db->execute();
    }

    public function carDeleteQuery(): void
    {
        $carId = $_POST['car_id'];
        $this->db->query('DELETE FROM car WHERE id = ?');
        $this->db->bind(1, $carId, PDO::PARAM_INT);
        $this->db->execute();
    }
}
