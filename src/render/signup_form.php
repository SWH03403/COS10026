<form method="post">
	<label for="username">Username</label>
	<input id="username" type="text" name="username" value="<?= $opts['username'] ?>" required>
	<br>
	<label for="email">Email</label>
	<input id="email" type="text" name="email" required>
	<br>
	<label for="password">Password</label>
	<input id="password" type="password" name="password" required>
	<br>
	<label for="repassword">Repeat Password</label>
	<input id="repassword" type="password" name="repassword" required>
	<br>
	<input type="hidden" name="token" value="<?= get_csrf() ?>">
	<input type="submit" value="Sign Up">
</form>
