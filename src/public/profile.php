<?php
	require '../init.php';
	if (!has_user()) { redirect('login'); }
	render_page("<p>Welcome, {$_SESSION['user']}!</p>", ['title' => 'Welcome page']);
?>
