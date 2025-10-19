<form method="post" action="process.php">
	<label for="username">Username</label>
	<input id="username" type="text" name="username" required>
	<br>
	<label for="password">Password</label>
	<input id="password" type="password" name="password" required>
	<br>
	<input type="hidden" name="token" value="<?php echo $opts['csrf'] ?>">
	<input type="submit" value="Login">
</form>
