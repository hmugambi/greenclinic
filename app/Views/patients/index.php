<h2><?= esc($title) ?></h2>

<a href="<?= site_url('patients/new'); ?>">
        <button type="button" class="btn btn-primary">Add Patient</button>
 </a>

<?php if (empty($patient_details) && is_array($patient_details)): ?>
    <h3>No Patient Details</h3> 
    <p>Unable to find any patient record for you.</p> 
<?php else: ?>  
    <table class="table table-striped table-hover">
    <thead>
        <tr> 
        <th scope="col">First Name</th>
        <th scope="col">Middle Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Phone</th>
        <th scope="col">E-mail</th>
        <th scope="col"></th>
        </tr>
    </thead>
   <tbody>
    <?php foreach ($patient_details as $patient_item): ?>
        <tr>
            <th> <?= esc($patient_item['first_name']) ?> </th>
            <th> <?= esc($patient_item['middle_name']) ?> </th>
            <th> <?= esc($patient_item['last_name']) ?> </th>
            <th> <?= esc($patient_item['phone_no']) ?> </th>
            <th> <?= esc($patient_item['email']) ?> </th>
            <th> <a href="/patients/<?= esc($patient_item['id'], 'url') ?>">View details</a> </th> 
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>  
<?php endif ?>