<?php
	require '../init.php';
	if (has_user()) { redirect('welcome'); }

	new_csrf();
	$r = function() {
		render('login_form');
		if (!empty($_SESSION['errors'] ?? [])) {
			$err = $_SESSION['errors'][0];
			$_SESSION['errors'] = []; // Show error once.
			echo "<p>Error: $err!</p>";
		}
	};
	render_page($r, ['title' => 'Login page']);
?>
