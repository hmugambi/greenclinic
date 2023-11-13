<h2><?= esc($title) ?></h2>
<br/>
 

<form action="/patients" method="post">
<div class="col-md-6">
    <div class="form-group">


    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="input" class="form-control" name="first_name" value="<?= esc($patient_details['first_name']) ?>">
        <br>
    </div>

    <div class="mb-3" >
        <label for="middle_name">Middle name</label>
        <input  type="input" class="form-control" name="middle_name" value="<?= esc($patient_details['middle_name']) ?>">
        <br>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input  type="input"  class="form-control" name="last_name" value="<?= esc($patient_details['last_name']) ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="phone_no" class="form-label">Phone No.</label>
        <input  type="input" class="form-control" name="phone_no" value="<?= esc($patient_details['phone_no'])  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail </label>
        <input  type="input" class="form-control" name="email" value="<?= esc($patient_details['email'])  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="dateOfBirth" class="form-label">Date Of Birth</label>
        <input  type="input" class="form-control" name="dateOfBirth" value="<?= esc($patient_details['date_of_birth'])  ?>">
        <br>
    </div>

    <input type="submit" name="submit" value="Create Patient Record">
    </div>
</div>
</form>