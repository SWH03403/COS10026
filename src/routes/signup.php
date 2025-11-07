<?php
if (has_user()) { redirect(DEFAULT_ROUTE); }

$errors = [];
$user = '';

render_page(['signup_form', 'errors'], [
	'title' => 'Sign Up',
	'username' => clean($user),
	'errors' => $errors,
	'nav' => '<a href="/login">Login</a>',
]);
