<?php include 'init_database.php';?>

<!doctype html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tankdaten eintragen</title>
        <link rel="stylesheet" href="../../../%23/style.css">
        <?php include 'navbar.php' ?>
    </head>
    <body>
        <form id="formCenter" action="tankWithTax.php" method="post">
            <h1>Tankdaten</h1><br>
            <span>Wählen Sie einen Dienstwagen aus: </span>
            <select name="carId" id="carId">
            <?php
            while ($rows = $carData->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?php echo ($rows['id']);?>" id="<?php echo ($rows['id']);?>"><?php echo ($rows['model']); ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <span>Wählen Sie eine/n Fahrer/in aus: </span>
            <select name="driverId" id="driverId">
                <?php
                while ($rows = $driverData->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo ($rows['id']);?>" id="<?php echo ($rows['id']);?>"><?php echo ($rows['lastname']); ?></option>
                    <?php
                }
                ?>
            </select>
            <br><br>
            <span>Wählen Sie Ihre Kraftstoffart: </span>
            <select name="fuelType" id="fuelType" required>
                <option value="Diesel">Diesel</option>
                <option value="Super E10">Super E10</option>
                <option value="Super">Super</option>
                <option value="Super+">Super+</option>
            </select>
            <br><br>
            <table>
                <span>Tragen Sie die Tankmenge und Zahlbeträge ein:</span><br>
                <span class="error"></span>
                <br><br>
                <tr>
                    <th></th>
                    <td>Tankmenge</td>
                    <td>Zahlbetrag</td>
                    <td>Fahrleistung(km) *optional</td>
                </tr>
                <tr>
                    <td><span>Tankvorgang1:</span></td>
                    <td><input class='input' type="number" name="amount1" id="amount1" min="1" max="1000" step="0.01" ></td>
                    <td><input class="input" type="number" name="cost1" id="cost1" min="1" max="10000" step="0.01"></td>
                    <td><input class='input' type="number" name="performance1" id="performance1" max="3000" step="0.01"></td>
                </tr>
                <tr>
                    <td><span>Tankvorgang2:</span></td>
                    <td><input class='input' type="number" name="amount2" id="amount2" min="1" max="1000" step="0.01"></td>
                    <td><input class='input' type="number" name="cost2" id="cost2" min="1" max="10000" step="0.01"></td>
                    <td><input class='input' type="number" name="performance2" id="performance2" max="3000" step="0.01"></td>
                </tr>
                <tr>
                    <td><span>Tankvorgang3:</span></td>
                    <td><input class='input' type="number" name="amount3" id="amount3" min="1" max="1000" step="0.01"></td>
                    <td><input class='input' type="number" name="cost3" id="cost3" min="1" max="10000" step="0.01"></td>
                    <td><input class='input' type="number" name="performance3" id="performance3" max="3000" step="0.01"></td>
                </tr>
                <tr>
                    <td><span>Tankvorgang4:</span></td>
                    <td><input class='input' type="number" name="amount4" id="amount4" min="1" max="1000" step="0.01"></td>
                    <td><input class='input' type="number" name="cost4" id="cost4" min="1" max="10000" step="0.01"></td>
                    <td><input class='input' type="number" name="performance4" id="performance4" max="3000" step="0.01"></td>
                </tr>
            </table>
            <br>
            <span>Ergebnis mit MwSt</span>
            <input type="submit" name="submit" value="Absenden">
            <span>Ergebnis ohne MwSt</span>
            <input type="submit" formaction="tankWithoutTax.php" name="submit" value="Absenden"></a>
        </form>
        <script src="../../../%23/script.js"></script>
    </body>
</html>