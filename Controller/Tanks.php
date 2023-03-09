<?php
declare(strict_types=1);

class Tanks extends BaseController
{
    private Tank $tankModel;

    public function __construct()
    {
        $this->tankModel = $this->model('Tank');
    }

    public function __invoke(string $uri): void
    {
        switch ($uri){
            case "tankSearch":
                $this->tankSearch();
                break;
            case "tankShow":
                $this->tankShow();
                break;
            case "tankAdd":
                $this->tankAdd();
                break;
            case "tankResult":
                $this->tankResult();
                break;
            case 'tankdataSave':
                $this->tankdataSave();
                break;
            case "tankUpdate":
                $this->tankUpdate();
                break;
            case "tankUpdated":
                $this->tankUpdated();
                break;
            case "tankDelete":
                $this->tankDelete();
                break;
            default:
                require 'views/src/404.html';
        }
    }

    public function tankSearch(): void
    {
        $tankId = $this->tankModel->getTankIdQuery();
        $carModel = $this->tankModel->getCarModelQuery();
        $driverFirstName = $this->tankModel->getDriverNameQuery();
        $tankData = ['tankId' => $tankId, 'carModel' => $carModel, 'driverFirstname' => $driverFirstName];
        $this->view('tank/tankSearch', $tankData);
    }

    public function tankShow(): void
    {
        $tankAll = $this->tankModel->getTankQuery();
        $tankData = ['tankAll' => $tankAll];
        $this->view('tank/tankShow', $tankData);
    }


    public function tankAdd(): void
    {
        $carModel = $this->tankModel->getCarModelQuery();
        $driverFirstName = $this->tankModel->getDriverNameQuery();
        $tankData = ['carModel' => $carModel, 'driverFirstname' => $driverFirstName];
        $this->view('tank/tankAdd', $tankData);
    }


    public function tankResult(): void
    {

            include 'helpers/calculation.php';
            $tankData = ['carId' => $carId,
                'driverId' => $driverId,
                'performanceData' => $performanceData,
                'performanceSum' => $performanceSum,
                'amountSum' => $amountSum,
                'fuelType' => $fuelType,
                'costSum' => $costSum,
                'mwstSum' => $mwstSum,
                'nettoSum' => $nettoSum,
                'averagePrice' => $averagePrice,
                'mwstOnAverage' => $mwstOnAverage,
                'nettoOnAverage' => $nettoOnAverage,
                'formatedCostSum' => $formatedCostSum,
                'formatedAmountSum' => $formatedAmountSum
            ];

            $this->view('tank/tankResult', $tankData);

    }

    public function tankdataSave(): void
    {

        $tankData = [
            'tankId' => $_POST['tankId'],
            'carId' => $_POST['carId'],
            'driverId' => $_POST['driverId'],
            'performanceData' => $_POST['performanceData'],
            'performanceSum' => $_POST['performanceSum'],
            'amountSum' => $_POST['amountSum'],
            'fuelType' => $_POST['fuelType'],
            'costSum' => $_POST['costSum']
        ];
        $this->tankModel->tankResultQuery($tankData);
        header('Location: tankSearch');
    }

    public function tankUpdate(): void
    {
        $tankId = $_POST['tank_id'];
        $carModel = $this->tankModel->getCarModelQuery();
        $driverFirstName = $this->tankModel->getDriverNameQuery();
        $tankData = ['tankId' => $tankId, 'carModel' => $carModel, 'driverFirstname' => $driverFirstName];
        $this->view('tank/tankUpdate', $tankData);
    }

    public function tankUpdated(): void
    {
        include 'helpers/calculation.php';
        $tankData = [
            'tankId' =>  $_POST['tankId'],
            'carId' => $carId,
            'driverId' => $driverId,
            'performanceData' => $performanceData,
            'performanceSum' => $performanceSum,
            'amountSum' => $amountSum,
            'fuelType' => $fuelType,
            'costSum' => $costSum,
            'mwstSum' => $mwstSum,
            'nettoSum' => $nettoSum,
            'averagePrice' => $averagePrice,
            'mwstOnAverage' => $mwstOnAverage,
            'nettoOnAverage' => $nettoOnAverage,
            'formatedCostSum' => $formatedCostSum,
            'formatedAmountSum' => $formatedAmountSum,
            'date' => $_POST['date']
        ];

        $this->view('tank/tankResult', $tankData);
    }

    public function tankDelete(): void
    {
        $this->tankModel->tankDeleteQuery();
        header('Location: tankSearch');
    }

}
