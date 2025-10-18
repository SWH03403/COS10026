<?php
	require '../session.php';
	$root = dirname(__DIR__);
	$title = 'Login page';

	if (has_user()) { redirect('welcome'); }
?>

<?php render_top() ?>
<form method="post" action="process.php">
	<label for="username">Username:</label>
	<input id="username" type="text" name="username" required>
	<br>
	<label for="password">Password:</password>
	<input id="password" type="password" name="password" required>
	<br>
	<input type="hidden" name="token" value="top-secret">
	<input type="submit" value="Login">
</form>
<?php render_bottom() ?>
