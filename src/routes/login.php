<?php
if (has_user()) { redirect(DEFAULT_ROUTE); }

$errors = [];
$user = '';
if (is_post()) {
	$user = from_form('username');
	$pass = from_form('password');
	$csrf = from_form('token');

	if (!check_csrf($csrf)) { array_push($errors, 'Invalid CSRF token'); }
	if ($user !== 'admin') { array_push($errors, 'Wrong hard-coded username'); }
	if ($pass !== 'admin') { array_push($errors, 'Wrong hard-coded password'); }
	if (empty($errors)) { set_user($user); redirect(DEFAULT_ROUTE); }
}

new_csrf();
render_page(['login_form', 'errors'], [
	'title' => 'Login',
	'username' => clean($user),
	'errors' => $errors,
]);
