<?php
	require '../session.php';
	if (!has_user()) { redirect('login'); }
	render_page("<p>Welcome, $user!</p>", ['title' => 'Welcome page']);
?>
