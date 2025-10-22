<?php if (empty($opts['errors'])) { return; } ?>
<p>Got <?php echo count($opts['errors']) ?> error(s):</p>
<ul>
	<?php foreach ($opts['errors'] as $err) { echo "<li>$err</li>"; } ?>
</ul>
