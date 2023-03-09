<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>
    <form id="formCenter" action="tankUpdate" method="post">
        <input type="submit" value="Daten ändern">
        <input type="submit" formaction="tankDelete" value="Daten löschen">
        <table>
            <thead>
            <tr>
                <th>Auswählen</th>
                <th>Tank-ID</th>
                <th>Dienstwagen-ID</th>
                <th>Fahrer-ID</th>
                <th>Kraftstoffart</th>
                <th>Tankmenge</th>
                <th>Zahlbetrag</th>
                <th>Fahrleistung</th>
                <th>Datum</th>
            </tr>
            </thead>
            <?php foreach ($data['tankAll'] as $row) : ?>
                <tr>
                    <td><input type="radio" name="tank_id" value="<?php echo $row->tank_id ?>" required></td>
                    <td><?php echo $row->tank_id; ?></td>
                    <td><?php echo $row->car_id; ?></td>
                    <td><?php echo $row->driver_id; ?></td>
                    <td><?php echo $row->fuel_type; ?></td>
                    <td><?php echo number_format($row->amount_sum, 2, ",", ".") . " L";?></td>
                    <td><?php echo number_format($row->cost_sum, 2, ",", ".") . " €";?></td>
                    <td><?php echo number_format($row->performance_sum, 2, ",", ".") . " km";?></td>
                    <td><?php echo $row->date; ?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </form>
<?php include 'views/inc/footer.php'; ?>