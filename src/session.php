<?php
	session_start();
	function redirect(string $path) { header("Location: $path.php"); exit; }
	function has_user(): bool { return isset($_SESSION['user']); }

	function render(string $part) {
		global $root, $title;
		if (!(isset($root) && isset($title))) { http_response_code(500); exit; }
		require $root . "/parts/$part.php";
	}
	function render_top() { render('_top'); }
	function render_bottom() { render('_bottom'); }
?>
