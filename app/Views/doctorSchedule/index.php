<h2><?= esc($title) ?></h2>
 
<?php if (empty($records) && is_array($records)): ?>
    <h3>No Appointment</h3> 
    <p>Unable to find any appointment record for you.</p> 
<?php else: ?>  
    <table class="table table-striped table-hover">
    <thead>
        <tr> 
        <th scope="col">Appointment Date</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Patient Name</th>
        <th scope="col">Patient Phone no.</th>
        <th scope="col">Patient E-mail</th>
        <th scope="col"></th>
        </tr>
    </thead>
   <tbody>
    <?php foreach ($records as $record): ?>
        <tr>
            <th> <?= esc($record['appointment_date_time']) ?> </th>
            <th> <?= esc($record['doctorName']) ?> </th>
            <th> <?= esc($record['patientName']) ?> </th>
            <th> <?= esc($record['phone_no']) ?> </th>
            <th> <?= esc($record['email']) ?> </th>
            <th> <a href="/appointment/<?= esc($record['id'], 'url') ?>">View details</a> </th> 
        </tr>
    <?php endforeach ?>
    </tbody>
    </table>  
<?php endif ?>