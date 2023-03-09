<?php
$driverId = $_POST['driverId'];
$carId = $_POST['carId'];
$fuelType = $_POST["fuelType"];
$amount1 = $_POST["amount1"];
$amount2 = $_POST["amount2"];
$amount3 = $_POST["amount3"];
$amount4 = $_POST["amount4"];

$cost1 = $_POST["cost1"];
$cost2 = $_POST["cost2"];
$cost3 = $_POST["cost3"];
$cost4 = $_POST["cost4"];

$performance1 = $_POST['performance1'];
$performance2 = $_POST['performance2'];
$performance3 = $_POST['performance3'];
$performance4 = $_POST['performance4'];

$amounts = [$amount1, $amount2, $amount3, $amount4];
$amountSum = 0;
$costs = [$cost1, $cost2, $cost3, $cost4];
$costSum = 0;
$performances = [$performance1, $performance2, $performance3, $performance4];
$performanceSum = 0;

$valid = false;
$valid1 = false;
$valid2 = false;
$valid3 = false;
$valid4 = false;

if (!empty($amount1) || !empty($amount2) || !empty($amount3) || !empty($amount4)) {
    if (!empty($amount1) && !empty($cost1) || empty($amount1) && empty($cost1)) {
        $valid1 = true;
    }

    if (!empty($amount2) && !empty($cost2) || empty($amount2) && empty($cost2)) {
        $valid2 = true;
    }

    if (!empty($amount3) && !empty($cost3) || empty($amount3) && empty($cost3)) {
        $valid3 = true;
    }

    if (!empty($amount4) && !empty($cost4) || empty($amount4)  && empty($cost4)) {
        $valid4 = true;
    }
}

$valid = $valid1 && $valid2 && $valid3 && $valid4;

if (false === $valid) {
    echo "
    <p style='margin: 50px; text-align: center'>
    Geben Sie für einen Tankvorgang sowohl die Tankmenge als auch den Zahlbetrag ein!
    </p>
    <button style='text-align: center; background-color: #2a5d84; display: block; margin: 0 auto;'>
    <a href='index.php' style='text-decoration: none; color: #fff;'>Zurück zum Eintragen</a>
    </button>
    ";
        exit();
} else {
    foreach ($amounts as $amount) {
        if (!empty($amount)) {
            $amountSum += $amount;
        }
    };

    foreach ($costs as $cost) {
        if (!empty($cost)) {
            $costSum += $cost;
        }
    }

    foreach ($performances as $performance) {
        if (!empty($performance)) {
            $performanceSum += $performance;
        }
    }

    if ($performanceSum == 0) {
        $performanceData = "Keine Angabe";
    } else {
        $performanceData = number_format($amountSum / $performanceSum * 100, 2, ",", ".") . " L/100km";
    }


    $averagePrice = round($costSum / $amountSum, 2);
    $nettoSum = round($costSum / 1.19, 2);
    $mwstSum = number_format( round($nettoSum * 0.19, 2), 2, ",", ".");
    $nettoOnAverage = number_format( round($averagePrice / 1.19, 2), 2, ",", ".");
    $mwstOnAverage = number_format( round(round($averagePrice / 1.19, 2) * 0.19, 2), 2, ",", ".");
    $averagePrice = number_format(round($costSum / $amountSum, 2 ), 2, ",", ".");
    $formatedAmountSum = number_format($amountSum, 2, ",", ".");
    $nettoSum = number_format(round($costSum / 1.19, 2), 2, ",", ".");
    $formatedCostSum = number_format($costSum, 2, ",", ".");
}
