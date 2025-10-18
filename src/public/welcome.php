<?php
	$root = dirname(__DIR__);
	$title = 'Welcome page';
	require_once '../session.php';

	if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
?>

<?php render_top() ?>
<p>Welcome, <?php echo $user ?>!</p>
<?php render_bottom() ?>
