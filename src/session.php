<?php
	session_start();

	function redirect(string $path) { header("Location: $path.php"); exit; }
	function has_user(): bool { return isset($_SESSION['user']); }

	function render(string $part) {
		global $opts;
		if (!isset($opts)) { http_response_code(500); exit; }
		require $opts['root'] . "/parts/$part.php";
	}

	function render_page(string|callable $content, array $new_opts = []) {
		global $opts;
		$opts = $new_opts;
		$opts['root'] = $opts['root'] ?? __DIR__;
		$opts['title'] = $opts['title'] ?? 'Unnamed page';

		render('_top');
		if (is_string($content)) { echo "$content"; } else { $content($opts); }
		render('_bottom');
	}
?>
