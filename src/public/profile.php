<?php
	require '../init.php';
	$user = get_user();
	if (is_null($user)) { redirect('login'); }
	render_page("<p>Welcome, $user!</p>", ['title' => 'Welcome page']);
?>
