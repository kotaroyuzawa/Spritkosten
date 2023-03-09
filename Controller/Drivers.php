<?php
declare(strict_types=1);

class Drivers extends BaseController
{
    private Driver $driverModel;

    public function __construct()
    {
        $this->driverModel = $this->model('driver');
    }

    public function __invoke(string $uri): void
    {
        switch ($uri) {
            case "driverShow":
                $this->driverShow();
                break;
            case "driverAdd":
                $this->driverAdd();
                break;
            case "driverAdded":
                $this->driverAdded();
                break;
            case "driverUpdate":
                $this->driverUpdate();
                break;
            case "driverUpdated":
                $this->driverUpdated();
                break;
            case "driverDelete":
                $this->driverDelete();
                break;
            default:
                require 'views/src/404.html';
        }
    }

    public function driverShow(): void
    {
        $driverDataAll = $this->driverModel->getDriverAll();

        $driverData = ['driverData' => $driverDataAll];

        $this->view('driver/driverShow', $driverData);
    }

    public function driverAdd(): void
    {
        $this->view('driver/driverAdd');
    }

    public function driverAdded(): void
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $this->driverModel->driverAddQuery($firstname, $lastname, $age);
        header("Location: driverShow");
    }

    public function driverUpdate(): void
    {
        $driverId = $_POST['driver_id'];
        $this->view('driver/driverUpdate', $driverId);
    }

    public function driverUpdated(): void
    {
        $driverId = $_POST['driver_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $this->driverModel->driverUpdateQuery($driverId, $firstname, $lastname, $age);
        header('Location: driverShow');
    }

    public function driverDelete(): void
    {
        try {
            $this->driverModel->driverDeleteQuery();
            header('Location: driverShow');
        } catch (Exception $e) {
            $this->view('driver/driverDelete');
        }
    }

}