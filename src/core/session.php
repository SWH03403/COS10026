<?php
session_start();

function new_csrf() { $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); }
function get_csrf(): string { return $_SESSION['csrf_token']; }
function check_csrf(string $token): bool {
	$equal = $_SESSION['csrf_token'] === $token;
	$_SESSION['csrf_token'] = null;
	return $equal;
}

function get_user(): ?string { return $_SESSION['user'] ?? null; }
function has_user(): bool { return !is_null(get_user()); }
function set_user(?string $user) {
	session_regenerate_id(true);
	$_SESSION['user'] = $user;
}

// https://www.php.net/manual/en/function.session-unset.php#107089
function reset_state() {
	session_unset();
	session_destroy();
	session_write_close();
	setcookie(session_name(), '', 0, '/');
	session_regenerate_id(true);
}
