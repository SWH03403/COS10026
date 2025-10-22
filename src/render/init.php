<?php
	function render(string $part) {
		global $opts;
		if (!isset($opts)) { http_response_code(500); exit; }
		require __DIR__ . "/$part.php";
	}

	function render_page(string|callable $content, array $opts = []) {
		$opts['title'] = $opts['title'] ?? 'Unnamed page';

		render('meta/top');
		if (is_string($content)) { echo "$content"; } else { $content($opts); }
		render('meta/bottom');
	}
?>
