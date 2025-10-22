<?php
const DEFAULT_ROUTE = 'profile';

function get_uri(): string { return ltrim($_SERVER['REQUEST_URI'], '/'); }
function get_method(): string { return $_SERVER['REQUEST_METHOD']; }
function is_post(): bool { return get_method() == 'POST'; }

function _abs_path(string $uri): string { return __DIR__ . "/$uri.php"; }
function route(string $uri) { require _abs_path($uri); }
function has_route(string $uri): bool {
	if ($uri == DEFAULT_ROUTE) { return false; }
	return is_readable(_abs_path($uri));
}
function redirect(string $uri) {
	if ($uri == DEFAULT_ROUTE) { $uri = ''; }
	header("Location: /$uri"); exit;
}

function catch_404() { http_response_code(404); render('404'); exit; }
