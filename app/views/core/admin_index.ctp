<h2>Core Controller</h2>

<?php foreach($statuses as $status): ?>

<?php echo $status['message']; ?> : <?php echo $status['result']; ?>
<br />
<?php endforeach; ?>
