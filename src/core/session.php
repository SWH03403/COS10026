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
function set_user(?string $user) { $_SESSION['user'] = $user; }
function reset_state() { set_user(null); session_unset(); }
