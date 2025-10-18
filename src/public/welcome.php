<?php
	require '../session.php';
	$root = dirname(__DIR__);
	$title = 'Welcome page';

	if (!has_user()) { redirect('login'); }

	render_top();
	echo "<p>Welcome, $user!</p>";
	render_bottom();
?>
