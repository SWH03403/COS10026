<?php
	require '../init.php';
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') { redirect('profile'); }

	$user = clean($_POST['username'] ?? '');
	$pass = clean($_POST['password'] ?? '');
	$csrf = clean($_POST['token'] ?? '');

	// FIX: Use database for authentication.
	if (check_csrf($csrf)) {
		$_SESSION['errors'] = ['Invalid CSRF token'];
		redirect('login');
	} elseif ($user === 'admin' && $pass === 'super.secret') {
		set_user($user);
		redirect('welcome');
	} else {
		$_SESSION['errors'] = ['Invalid account credential'];
		redirect('login');
	}
?>
