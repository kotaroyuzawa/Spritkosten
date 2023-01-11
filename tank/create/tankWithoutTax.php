<?php include 'calculation.php'; ?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten registriert ansehen</title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <style>
            table {
                background-color: #E3E3E7;
                border: 1px solid black;
            }

            a {
                text-decoration: none;
                color: #fff;
            }

            button {
                display: block;
                margin: 0 auto;
                background-color: #2a5d84;
            }
        </style>
    </head>
    <body>
        <div class="rechnung-container">
            <h1>Ihre Kraftstoffrechnung</h1>
            <table>
                <tr>
                    <td><?php echo "Ihre Kraftstoffkosten für $amountSum Liter $fuelType"; ?></td>
                    <td><?php echo $costSum . " €"; ?></td>
                </tr>
                <tr>
                    <td><?php echo "Durchschnittsbetrag für $fuelType pro Liter"; ?></td>
                    <td><?php echo $averagePrice . "€/L"; ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>Ihre Fahrleistung</td>
                    <td align="right"><?php echo $performanceData;?></td>
                </tr>
            </table>
            <button><a href='index.php'>Erneut rechnen</a></button>
        </div>
    </body>
</html>