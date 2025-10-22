<?php
require '../init.php';

match (get_uri()) {
	'/', '/profile' => route('profile'),
	'/login' => route('login'),
	'/logout' => route('logout'),
	default => catch_404(),
};
