<?php
require '../init.php';

$uri = get_uri();
match (true) {
	$uri == '', => route(DEFAULT_ROUTE),
	has_route($uri) => route($uri),
	default => catch_404(),
};
