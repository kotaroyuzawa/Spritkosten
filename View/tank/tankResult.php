
<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>

    <form action="tankdataSave" method="post">
        <div class="calcDiv">
            <table class="calcTable">
                <h1>Ihre Kraftstoffrechnung</h1>
                <tr>
                    <td>Dienstwagen-ID</td>
                    <td align="right"><input type="number" name="carId" value="<?php echo $data['carId'] ;?>" readonly></td>
                </tr>
                <tr>
                    <td>Fahrer-ID</td>
                    <td align="right"><input type="number" name="driverId" value="<?php echo $data['driverId'] ;?>" readonly></td>
                </tr>
                <tr>
                    <td>Ihre Fahrleistung</td>
                    <td align="right"><input name="performanceData" value="<?php echo $data['performanceData'];?>" readonly></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><?php echo "Ihre Kraftstoffkosten für " . $data['amountSum'] . " Liter " . $data['fuelType']; ?></td>
                    <td align="right"><input name="formatedCostSum" value="<?php echo $data['formatedCostSum'] . " €"; ?>" readonly></td>
                </tr>
                <tr>
                    <td>19,0% MwsT</td>
                    <td align="right"><input name="mwstSum" value="<?php echo $data['mwstSum'] . " €"; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td align="right"><input name="nettoSum" value="<?php echo $data['nettoSum'] . " €"; ?>" readonly></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><?php echo "Durchschnittsbetrag für " . $data['fuelType'] . " pro Liter"; ?></td>
                    <td align="right"><input name="averagePrice" value="<?php echo $data['averagePrice'] . " €/L"; ?>" readonly></td>
                </tr>
                <tr>
                    <td>19,0% MwsT</td>
                    <td align="right"><input name="mwstOnAverage" value="<?php echo $data['mwstOnAverage'] . " €/L"; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Netto</td>
                    <td align="right"><input name="nettoOnAverage" value="<?php echo $data['nettoOnAverage'] . " €/L"; ?>" readonly></td>
                </tr>
            </table>
            <input type="hidden" name="fuelType" value="<?php echo $data['fuelType'] ?>">
            <input type="hidden" name="amountSum" value="<?php echo $data['amountSum'] ?>">
            <input type="hidden" name="costSum" value="<?php echo $data['costSum'] ?>">
            <input type="hidden" name="performanceSum" value="<?php echo $data['performanceSum'] ?>">
            <p class="dataSave">Klicken Sie den Button, um diese Daten zu speichern</p>
            <br>
            <input type="submit" name="submit" value="Daten speichern">
        </div>

    </form>
<?php include 'views/inc/footer.php'; ?>

