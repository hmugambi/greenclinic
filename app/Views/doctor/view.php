<h2><?= esc($title) ?></h2>
<br/>
 

<form action="<?= site_url('doctor/create'); ?>" method="post">
<div class="col-md-6">
    <div class="form-group">

    <?= csrf_field() ?>
    
    <input type="hidden" name="id" value="<?= esc($record['id']) ?>" >
  

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="input" class="form-control" name="name" value="<?= esc($record['name']) ?>">
        <br>
    </div> 
    <div class="mb-3">
        <label for="phone" class="form-label">Phone No.</label>
        <input  type="input" class="form-control" name="phone" value="<?= esc($record['phone'])  ?>">
        <br>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail </label>
        <input  type="input" class="form-control" name="email" value="<?= esc($record['email'])  ?>">
        <br>
    </div>
    <div class="mb-3" >
        <label for="specialisation">Specialisation</label>
        <input  type="input" class="form-control" name="specialisation" value="<?= esc($record['specialisation']) ?>">
        <br>
    </div>
    <?php if (empty($record) && is_array($record)): ?>
        <input type="submit" name="submit" value="Create Doctor Record">
    <?php else: ?>
        <input type="submit" name="submit" value="Edit Doctor Record">
    <?php endif ?>   
    </div>
</div>
</form>