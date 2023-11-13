<h2><?= esc($title) ?></h2>

<a href="<?= site_url('doctor/new'); ?>">
        <button type="button" class="btn btn-primary">Add Doctor</button>
 </a>

<?php if (empty($records) && is_array($records)): ?>
    <h3>No Doctor Details</h3> 
    <p>Unable to find any doctor record for you.</p> 
<?php else: ?>  
    <table class="table table-striped table-hover">
    <thead>
        <tr> 
        <th scope="col">Name</th> 
        <th scope="col">Phone</th>
        <th scope="col">E-mail</th>
        <th scope="col">Specialisation</th>        
        <th scope="col"></th>
        </tr>
    </thead>
   <tbody>
    <?php foreach ($records as $record): ?>
        <tr>
            <th> <?= esc($record['name']) ?> </th> 
            <th> <?= esc($record['phone']) ?> </th>
            <th> <?= esc($record['email']) ?> </th> 
            <th> <?= esc($record['specialisation']) ?> </th>
            <th> <a href="/doctor/<?= esc($record['id'], 'url') ?>">View details</a> </th> 
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>  
<?php endif ?>