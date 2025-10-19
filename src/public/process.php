<?php
	require '../session.php';
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') { redirect('welcome'); }

	function clean(string $data): string { return htmlspecialchars(stripslashes(trim($data))); }
	$user = clean($_POST['username'] ?? '');
	$pass = clean($_POST['password'] ?? '');
	$csrf = clean($_POST['token'] ?? '');

	// FIX: Use database for authentication.
	if ($csrf !== $_SESSION['csrf_token']) {
		$_SESSION['errors'] = ['Invalid CSRF token'];
		redirect('login');
	} elseif ($user === 'admin' && $pass === 'super.secret') {
		$_SESSION['user'] = $user;
		redirect('welcome');
	} else {
		$_SESSION['errors'] = ['Invalid account credential'];
		redirect('login');
	}
?>
