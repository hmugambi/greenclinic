<h2><?= esc($title) ?></h2>

<?php if (! empty($patient_details) && is_array($patient_details)): ?>

    <?php foreach ($patient_details as $patient_item): ?>

        <h3><?= esc($patient_item['first_name']) ?></h3>

        <div class="main">
            <?= esc($patient_item['last_name']) ?>
        </div>
        <p><a href="/patients/<?= esc($patient_item['id'], 'url') ?>">View details</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Patient Details</h3>

    <p>Unable to find any patient record for you.</p>

<?php endif ?>