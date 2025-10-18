<?php
	require '../session.php';
	if (has_user()) { redirect('welcome'); }
	$r = function() {
		render('login_form');
		if (!empty($_SESSION['errors'] ?? [])) {
			$err = $_SESSION['errors'][0];
			echo "<p>Error: $err!</p>";
		}
	};
	render_page($r, ['title' => 'Login page'])
?>
