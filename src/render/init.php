<?php
	function render(string $component, array $opts = []) { require __DIR__ . "/$component.php"; }

	function render_page(string|callable $content, array $opts = []) {
		$opts['title'] = $opts['title'] ?? 'Unnamed page';

		render('meta/top', $opts);
		if (is_string($content)) { echo "$content"; }
		else { $content(); }
		render('meta/bottom', $opts);
	}
?>
