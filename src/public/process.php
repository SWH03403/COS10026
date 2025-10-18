<?php
	require '../session.php';
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') { redirect('welcome'); }

	function clean(string $data): string { return htmlspecialchars(stripslashes(trim($data))); }
	$user = clean($_POST['username'] ?? '');
	$pass = clean($_POST['password'] ?? '');

	// FIX: Use database for authentication.
	if ($user === 'admin' && $pass === 'super.secret') {
		$_SESSION['user'] = $user;
		redirect('welcome');
	} else {
		$_SESSION['errors'] = ['Invalid account credential'];
		redirect('login');
	}
?>
