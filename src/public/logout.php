<?php
	require '../session.php';
	unset($_SESSION['user']);
	redirect('login');
?>
