<?php
require '../init.php';

function _not_found() { http_response_code(404); exit; }

match (get_uri()) {
	'/', '/profile' => route('profile'),
	'/login' => route('login'),
	'/logout' => route('logout'),
	default => _not_found(),
};
