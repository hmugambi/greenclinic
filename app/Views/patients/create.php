<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/patients" method="post">
    <?= csrf_field() ?>

    <label for="first_name">First Name</label>
    <input type="input" name="first_name" value="<?= set_value('first_name') ?>">
    <br>

    <label for="middle_name">Middle name</label>
    <input  type="input" name="middle_name" value="<?= set_value('middle_name')?>">
    <br>

    <label for="last_name">Last name</label>
    <input  type="input" name="last_name" value="<?= set_value('last_name')  ?>">
    <br>

    <label for="phone_no">Phone No.</label>
    <input  type="input" name="phone_no" value="<?= set_value('phone_no')  ?>">
    <br>

    <label for="email">E-mail</label>
    <input  type="input" name="email" value="<?= set_value('email')  ?>">
    <br>

    <input type="submit" name="submit" value="Create Patient Record">
</form>