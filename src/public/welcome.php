<?php
	require '../session.php';
	$root = dirname(__DIR__);
	$title = 'Welcome page';

	if (!has_user()) { redirect('login'); }
?>

<?php render_top() ?>
<p>Welcome, <?php echo $user ?>!</p>
<?php render_bottom() ?>
