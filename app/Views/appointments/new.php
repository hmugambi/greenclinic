<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?= site_url('appointment/create'); ?>" method="post">
<div class="col-md-6">
    <div class="form-group">

    <?= csrf_field() ?>
    <input type="hidden" name="id" value="new" >
    <div class="mb-3">
        <label for="patientName" class="form-label">Patient Name</label>
        <select   class="form-control" name="patientName"  >
            <option value="">Select Patient</option>
            <?php foreach ($patientData as $dataItem): ?>
            <option value="<?= esc($dataItem['id']) ?>"><?= esc($dataItem['first_name']." ".$dataItem['last_name']) ?></option>  
            <?php endforeach ?>
        </select>
        <br>
    </div>

    <div class="mb-3">
        <label for="doctorName" class="form-label">Patient Name</label>
        <select   class="form-control" name="doctorName"  ?>">
            <option value="">Select Doctor</option>
            <?php foreach ($doctorData as $dataItem): ?>
            <option value="<?= esc($dataItem['id']) ?>"><?= esc($dataItem['name']) ?></option>  
            <?php endforeach ?>
        </select>
        <br>
    </div>

    <div class="mb-3">
        <label for="appointmentDate" class="form-label">Appointment Date</label>
        <input  type="date" class="form-control" name="appointmentDate" value="<?= set_value('appointmentDate')  ?>">
        <br>
    </div> 

    <input type="submit" name="submit" value="Create Appointment Record">
    </div>
</div>
</form>