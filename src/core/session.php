<?php
	session_start();

	function upsert_csrf_token(): string { return bin2hex(random_bytes(32)); }
	function check_csrf_token(string $token): bool { /*  TODO: */ }
	function check_user(): bool { return isset($_SESSION['user']); }
?>
