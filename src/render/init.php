<?php
	function render(string $component, array $opts = []) { require __DIR__ . "/$component.php"; }

	function render_page(array|callable|string $content, array $opts = []) {
		$opts['title'] = $opts['title'] ?? 'Unnamed page';

		render('meta/top', $opts);
		if (is_string($content)) { echo "$content"; }
		elseif (is_array($content)) { foreach ($content as $c) { render($c, $opts); }}
		else { $content(); }
		render('meta/bottom', $opts);
	}
?>
