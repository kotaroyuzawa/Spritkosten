<?php
declare(strict_types=1);

class Cars extends BaseController
{
    private Car $carModel;

    public function __construct()
    {
        $this->carModel = $this->model('car');
    }

    public function __invoke(string $uri): void
    {
        switch ($uri) {
            case "carAdd":
                $this->carAdd();
                break;
            case "carAdded":
                $this->carAdded();
                break;
            case "carShow":
                $this->carShow();
                break;
            case "carUpdate":
                $this->carUpdate();
                break;
            case "carUpdated":
                $this->carUpdated();
                break;
            case "carDelete":
                $this->carDelete();
                break;
            default:
                require 'views/src/404.html';
        }
    }

    public function carShow(): void
    {
        $carDataAll = $this->carModel->getCarAllQuery();

        $carData = ['carData' => $carDataAll];

        $this->view('car/carShow', $carData);
    }

    public function carAdd(): void
    {
        $this->view('car/carAdd');
    }

    public function carAdded(): void
    {
        $model = $_POST['model'];
        $date = $_POST['purchasingDate'];
        $this->carModel->carAddQuery($model, $date);
        header("Location: carAdd");
    }

    public function carUpdate(): void
    {
        $carId = $_POST['car_id'];
        $this->view('car/carUpdate', $carId);
    }

    public function carUpdated(): void
    {
        $carId = $_POST['car_id'];
        $model = $_POST['model'];
        $purchasingDate = $_POST['purchasingDate'];
        $this->carModel->carUpdateQuery($carId, $model, $purchasingDate);
        header('Location: carShow');
    }

    public function carDelete(): void
    {
        try {
            $this->carModel->carDeleteQuery();
            header('Location: carShow');
        } catch (Exception $e) {
            $this->view('car/carDelete');
        }
    }
}