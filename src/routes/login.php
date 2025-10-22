<?php
if (has_user()) { redirect('profile'); }

$errors = [];
$user = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user = get_formfield('username');
	$pass = get_formfield('password');
	$csrf = get_formfield('csrf');

	// FIX: Query database for authentication.
	if (check_csrf($csrf)) {
		array_push($errors, 'Invalid CSRF token');
	} elseif ($user === 'admin' && $pass === 'super.secret') {
		set_user($user);
		redirect('profile');
	} else {
		array_push($errors, 'Invalid account credential');
	}
}

new_csrf();
render_page(['login_form', 'errors'], [
	'title' => 'Login',
	'username' => $user,
	'errors' => $errors,
]);
