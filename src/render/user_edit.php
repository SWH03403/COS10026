<form method="post">
	<label for="pass-new">New password</label>
	<input id="pass-new" type="password" name="passnew" placeholder="(unchanged)">
	<br>
	<label for="pass-rep">Repeat new password</label>
	<input id="pass-rep" type="password" name="passrep">
	<br>
	<label for="email-new">New email</label>
	<input id="email-new" type="text" name="email" placeholder="(unchanged)">
	<br>
	<label for="pass-old">Current password</label>
	<input id="pass-old" type="password" name="pass" required>
	<br>
	<input type="submit" value="Save">

	<input type="hidden" name="token" value="<?= get_csrf() ?>">
</form>
