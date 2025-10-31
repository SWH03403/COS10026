<?php
function render(string $component) { global $opts; require __DIR__ . "/$component.php"; }

function render_page(array|callable|string $content, array $g_opts = []) {
	global $opts;
	$opts = $g_opts;
	$opts['title'] = $opts['title'] ?? 'Unnamed page';

	render('meta/top');
	if (is_string($content)) { echo "$content"; }
	elseif (is_array($content)) { foreach ($content as $c) { render($c); }}
	else { $content(); }
	render('meta/bottom');
}
