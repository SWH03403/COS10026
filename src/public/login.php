<?php
	require '../session.php';
	if (has_user()) { redirect('welcome'); }

	$token = new_csrf_token();
	$_SESSION['csrf_token'] = $token;

	$r = function() {
		render('login_form');
		if (!empty($_SESSION['errors'] ?? [])) {
			$err = $_SESSION['errors'][0];
			$_SESSION['errors'] = []; // Show error once.
			echo "<p>Error: $err!</p>";
		}
	};
	render_page($r, ['title' => 'Login page', 'csrf' => $token]);
?>
