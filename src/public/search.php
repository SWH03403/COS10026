<?php
	require '../session.php';
	require '../database.php';
	$db = new Database();
	$q = $_GET['model'] ?? '';
	$r = function() { render('search_form'); render('search_result'); };
	render_page($r, ['title' => 'The Car Catalog', 'db' => $db, 'query' => $q]);
?>
