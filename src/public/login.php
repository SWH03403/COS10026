<?php
	require '../session.php';
	if (has_user()) { redirect('welcome'); }
	render_page(fn() => render('login_form'), ['title' => 'Login page'])
?>
