<?php
if (!has_user()) { redirect('login'); }

$errors = [];
if (is_post()) {
}

new_csrf();
render_page(['user_edit', 'errors'], [
	'title' => 'Edit profile',
	'nav' => '<br><a href="/">Back</a>',
	'errors' => $errors,
]);
