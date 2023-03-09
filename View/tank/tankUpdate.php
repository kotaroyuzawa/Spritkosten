<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

    <form id="formCenter" action="tankUpdated" method="post">
        <span>Tank-ID (nicht änderbar): </span>
        <input name="tankId" id="tankId" value="<?php echo $data['tankId']?>" readonly><br><br>

        <span>Wählen Sie einen Dienstwagen aus: </span>
        <select name="carId" id="carId">
            <?php foreach ($data['carModel'] AS $row) : ?>
                <option value="<?php echo $row->id;?>" id="<?php echo $row->id ;?>"><?php echo $row->model; ?></option>
            <?php endforeach;?>
        </select>

        <br><br>
        <span>Wählen Sie eine/n Fahrer*in aus: </span>
        <select name="driverId" id="driverId">
            <?php foreach ($data['driverFirstname'] AS $row) : ?>
                <option value="<?php echo $row->id;?>" id="<?php echo $row->id;?>"><?php echo $row->firstname; ?></option>
            <?php endforeach; ?>
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
                <td><input class='input' type="number" name="amount1" id="amount1" min="1" max="1000" step="0.1" ></td>
                <td><input class="input" type="number" name="cost1" id="cost1" min="1" max="10000" step="0.01"></td>
                <td><input class='input' type="number" name="performance1" id="performance1" max="3000" step="0.01"></td>
            </tr>
            <tr>
                <td><span>Tankvorgang2:</span></td>
                <td><input class='input' type="number" name="amount2" id="amount2" min="1" max="1000" step="0.1"></td>
                <td><input class='input' type="number" name="cost2" id="cost2" min="1" max="10000" step="0.01"></td>
                <td><input class='input' type="number" name="performance2" id="performance2" max="3000" step="0.01"></td>
            </tr>
            <tr>
                <td><span>Tankvorgang3:</span></td>
                <td><input class='input' type="number" name="amount3" id="amount3" min="1" max="1000" step="0.1"></td>
                <td><input class='input' type="number" name="cost3" id="cost3" min="1" max="10000" step="0.01"></td>
                <td><input class='input' type="number" name="performance3" id="performance3" max="3000" step="0.01"></td>
            </tr>
            <tr>
                <td><span>Tankvorgang4:</span></td>
                <td><input class='input' type="number" name="amount4" id="amount4" min="1" max="1000" step="0.1"></td>
                <td><input class='input' type="number" name="cost4" id="cost4" min="1" max="10000" step="0.01"></td>
                <td><input class='input' type="number" name="performance4" id="performance4" max="3000" step="0.01"></td>
            </tr>
        </table>
        <br>
        <input type="date" name="date" required>
        <br><br>
        <span>Ergebnis mit MwSt</span>
        <input type="submit" name="submit" value="Absenden">
    </form>
    <script src="../public/script.js"></script>
    </body>
    </html>
<?php include 'views/inc/footer.php'; ?>