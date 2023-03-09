<?php include 'views/inc/header.php'; ?>
<?php include 'views/inc/navbar.php'; ?>
    <h1 class="title">Tankdaten ansehen</h1>
    <form id="tankSearchForm" action="tankShow" method="post">
        <span>Alle Daten ansehen</span>
        <button name="view_all" type="submit" >Alle Einträge ansehen</button>
    </form>
    <form id="tankSearchForm" action="tankShow" method="post">
        <span>Tankdaten durch eine Tank-ID suchen</span>

        <select name="tank_id" id="tank_id">

            <?php foreach ($data['tankId'] AS $row): ?>

                <option value="<?php echo $row->tank_id;?>" id="<?php echo$row->tank_id;?>"><?php echo$row->tank_id; ?></option>
            <?php endforeach; ?>
        </select><input type="submit" name="submit" value="Ansehen">
    </form>
    <form id="tankSearchForm" action="tankShow" method="post">
        <span>Tankdaten durch einen Dienstwagen suchen</span>
        <select name="car_id" id="car_id">
            <?php foreach ($data['carModel'] AS $row): ?>
                <option value="<?php echo $row->id;?>" id="<?php echo $row->id;?>"><?php echo $row->model; ?></option>
            <?php endforeach; ?>
        </select><input type="submit" name="submit" value="Ansehen">
    </form>
    <form id="tankSearchForm" action="tankShow" method="post">
        <span>Tankdaten durch eine/n Fahrer/in suchen</span>
        <select name="driver_id" id="driver_id">
            <?php foreach ($data['driverFirstname'] AS $row): ?>
                <option value="<?php echo $row->id;?>" id="<?php echo $row->id;?>"><?php echo $row->firstname; ?></option>
            <?php endforeach; ?>
        </select><input type="submit" name="submit" value="Ansehen">
    </form>
    <form id="tankSearchForm" action="tankShow" method="post">
        <label for="date_start">von</label>
        <input type="date" name="date_start" id="date_start" required>
        <label for="date_end">bis</label>
        <input type="date" name="date_end" required>
        </select>
        <input type="submit" name="submit" value="Ansehen">
    </form>
<?php include 'views/inc/footer.php'; ?>