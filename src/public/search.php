<?php
	require '../session.php';
	require '../database.php';
	$db = new Database();
	$query = $_GET['model'] ?? null;
	$r = function() { render('search_form'); };
	render_page($r, ['title' => 'The Car Catalog', 'db' => $db, 'query' => $query]);
?>
