<?php
if (has_user()) { redirect('profile'); }

$errors = [];
$user = '';
if (is_post()) {
	$user = from_form('username');
	$pass = from_form('password');
	$csrf = from_form('token');

	if (!check_csrf($csrf)) { array_push($errors, 'Invalid CSRF token'); }
	if (strlen($user) > 50) { array_push($errors, 'Username is too long'); }
	if (strlen($pass) > 99) { array_push($errors, 'Password is too long'); } // FIX: Remove if hashed.
	if (!empty($errors)) { goto end_post; }

	$db = new Database();
	$rows = $db->query('SELECT password FROM user WHERE name = ?', [$user]);
	$valid = !empty($rows) && $pass === $rows[0]['password'];
	if ($valid) { set_user($user); redirect('profile'); }
	array_push($errors, 'Invalid account credential');
}
end_post:

new_csrf();
render_page(['login_form', 'errors'], [
	'title' => 'Login',
	'username' => clean($user),
	'errors' => $errors,
]);
