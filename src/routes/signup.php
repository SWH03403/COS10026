<?php
if (has_user()) { redirect(DEFAULT_ROUTE); }

$errors = [];
$user = '';
$email = '';
if (is_post()) {
	$user = from_form('username');
	$email = from_form('email');
	$pass = from_form('password');
	$pass2 = from_form('repassword');
	$csrf = from_form('token');

	if (!check_csrf($csrf)) { $errors[] = 'Invalid CSRF token'; }
	if (strlen($user) > 50) { $errors[] = 'Username is too long'; }
	if (strlen($email) > 100) { $errors[] = 'Email is too long'; }
	if (strlen($pass) > 99) { $errors[] = 'Password is too long'; } // FIX: Remove if hashed.
	if ($pass != $pass2) { $errors[] = 'Repeat Password does not match'; }
	if (!empty($errors)) { goto end_post; }

	$db = new Database();
	$db->query('INSERT INTO user(name, password, email) VALUES (?, ?, ?)', [$user, $pass, $email]);
	set_user($user);
	redirect(DEFAULT_ROUTE);
}
end_post:

new_csrf();
render_page(['signup_form', 'errors'], [
	'title' => 'Sign Up',
	'username' => clean($user),
	'email' => clean($email),
	'errors' => $errors,
	'nav' => '<a href="/login">Login</a>',
]);
