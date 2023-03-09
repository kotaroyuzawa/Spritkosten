<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>
<h1 class="title">Dienstwagen</h1>

<form id="formCenter" action="carUpdate" method="post">
    <input type="submit" value="Daten ändern">
    <input type="submit" formaction="carDelete" value="Daten löschen">
    <table>
        <thead>
        <tr>
            <th>Auswählen</th>
            <th>Dienstwagen-ID</th>
            <th>Modell</th>
            <th>Kaufdatum</th>
            <th>Gesamte Kosten</th>
            <th>Gesamte Fahrleistung</th>
        </tr>
        </thead>

        <?php for ($i = 0; $i < count($data['carData']); $i++) { ?>
            <tr>
                <td><input type="radio" name="car_id" value="<?php echo $data['carData'][$i]->id; ?>" required></td>
                <td><?php echo $data['carData'][$i]->id;?></td>
                <td><?php echo $data['carData'][$i]->model;?></td>
                <td><?php echo $data['carData'][$i]->purchasingDate;?></td>
                <td><?php echo number_format($data['carData'][$i]->totalCost ?? 0.00, 2, ',', '.') . ' €' ;?></td>
                <td><?php echo number_format($data['carData'][$i]->totalPerformance ?? 0.00, 2, ',', '.') . ' km' ;?></td>
            </tr>
            <?php
        } ?>
    </table>
</form>
<?php include 'views/inc/footer.php'; ?>
