<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?= site_url('doctor/create'); ?>" method="post">
<div class="col-md-6">
    <div class="form-group">

    <?= csrf_field() ?>
    <input type="hidden" name="id" value="new" >
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="input" class="form-control" name="name" value="<?= set_value('name') ?>">
        <br>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone No.</label>
        <input  type="input" class="form-control" name="phone" value="<?= set_value('phone')  ?>">
        <br>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail </label>
        <input  type="input" class="form-control" name="email" value="<?= set_value('email')  ?>">
        <br>
    </div>

    <div class="mb-3" >
        <label for="specialisation">Specialisation</label>
        <input  type="input" class="form-control" name="specialisation" value="<?= set_value('specialisation')?>">
        <br>
    </div>

    <input type="submit" name="submit" value="Create Doctor Record">
    </div>
</div>
</form>