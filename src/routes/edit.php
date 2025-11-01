<?php
if (!has_user()) { redirect('login'); }

function process_form(): ?string {
	$csrf = from_form('token');
	if (!check_csrf($csrf)) { return 'Invalid CSRF token'; }

	$pass = from_form('pass');
	$db = new Database();
	$user = get_user();
	$rows = $db->query('SELECT password FROM user WHERE name = ?', [$user]);
	$valid = !empty($rows) && $pass === $rows[0]['password'];
	if (!$valid) { return 'Invalid password provided'; }

	$pass_new = from_form('passnew');
	if (!empty($pass_new)) {
		$pass_rep = from_form('passrep');
		if ($pass_new !== $pass_rep) { return 'Repeated password mis-match'; }
		$db->query('UPDATE user SET password = ? WHERE name = ?', [$pass_new, $user]);
	}

	$email = from_form('email');
	if (!empty($email)) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { return 'Invalid email'; }
		$db->query('UPDATE user SET email = ? WHERE name = ?', [$email, $user]);
	}

	return null;
}

$errors = [];
if (is_post()) {
	$err = process_form();
	if (is_null($err)) { redirect(DEFAULT_ROUTE); }
	$errors = [$err];
}

new_csrf();
render_page(['user_edit', 'errors'], [
	'title' => 'Edit profile',
	'nav' => '<br><a href="/">Back</a>',
	'errors' => $errors,
]);
