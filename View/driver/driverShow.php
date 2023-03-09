<?php include 'views/inc/header.php' ?>
<?php include 'views/inc/navbar.php' ?>

<h1 class="title">Fahrer</h1>
    <form id="formCenter" action="driverUpdate" method="post">
        <input type="submit" value="Daten ändern">
        <input type="submit" formaction="driverDelete" value="Daten löschen">
        <table>
            <thead>
            <tr>
                <th>Auswählen</th>
                <th>Fahrer-ID</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Alter</th>
                <td>Gesamte Tankkosten</td>
                <td>Gesamte Fahrleistung</td>
            </tr>
            </thead>
            <?php
            for ($i = 0; $i < count($data['driverData']); $i++) { ?>
                <tr>
                    <td><input type="radio" name="driver_id" value="<?php echo $data['driverData'][$i]->id ;?>" required></td>
                    <td><?php echo $data['driverData'][$i]->id ;?></td>
                    <td><?php echo $data['driverData'][$i]->firstname ;?></td>
                    <td><?php echo $data['driverData'][$i]->lastname ;?></td>
                    <td><?php echo $data['driverData'][$i]->age ;?></td>
                    <td><?php echo number_format($data['driverData'][$i]->totalCost ?? 0.00, 2, ',', '.') . ' €' ; ?></td>
                    <td><?php echo number_format($data['driverData'][$i]->totalPerformance ?? 0.00, 2, ',', '.') . ' km' ;?></td>
                </tr>
                <?php
            } ?>
        </table>
    </form>
<?php include 'views/inc/footer.php'; ?>