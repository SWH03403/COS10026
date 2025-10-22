<?php
function get_uri(): string { return $_SERVER['REQUEST_URI']; }
function get_method(): string { return $_SERVER['REQUEST_METHOD']; }
function is_post(): bool { return get_method() == 'POST'; }

function redirect(string $path) { header("Location: $path"); exit; }
function route(string $uri) { require __DIR__ . "/$uri.php"; }

function catch_404() { http_response_code(404); render('404'); exit; }
