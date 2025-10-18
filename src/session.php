<?php
	if (!isset($root) || !isset($title)) { http_response_code(403); exit; }

	session_start();

	function render(string $part) {
		global $root, $title;
		require $root . "/parts/$part.php";
	}
	function render_top() { render('_top'); }
	function render_bottom() { render('_bottom'); }
?>
