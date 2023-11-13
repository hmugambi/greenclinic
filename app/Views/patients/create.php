<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/patients" method="post">
<div class="col-md-6">
    <div class="form-group">


    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="input" class="form-control" name="first_name" value="<?= set_value('first_name') ?>">
        <br>
    </div>

    <div class="mb-3" >
        <label for="middle_name">Middle name</label>
        <input  type="input" class="form-control" name="middle_name" value="<?= set_value('middle_name')?>">
        <br>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input  type="input"  class="form-control" name="last_name" value="<?= set_value('last_name')  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="phone_no" class="form-label">Phone No.</label>
        <input  type="input" class="form-control" name="phone_no" value="<?= set_value('phone_no')  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail </label>
        <input  type="input" class="form-control" name="email" value="<?= set_value('email')  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="dateOfBirth" class="form-label">Date Of Birth</label>
        <input  type="date" class="form-control" name="dateOfBirth" value="<?= set_value('dateOfBirth')  ?>">
        <br>
    </div>

    <input type="submit" name="submit" value="Create Patient Record">
    </div>
</div>
</form>