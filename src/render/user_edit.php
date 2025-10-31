<fieldset>
	<legend>Password change</legend>
	<form method="post">
		<label for="pass-old">Old password</label>
		<input id="pass-old" type="password" name="pass" required>
		<br>
		<label for="pass-new">New password</label>
		<input id="pass-new" type="password" name="passnew" required>
		<br>
		<label for="pass-rep">Repeat password</label>
		<input id="pass-rep" type="password" name="passrep" required>
		<br>
		<input type="submit" value="Save">

		<input type="hidden" name="type" value="passchange">
		<input type="hidden" name="token" value="<?= get_csrf() ?>">
	</form>
</fieldset>
<fieldset>
	<legend>Email change</legend>
	<form method="post">
		<label for="email-new">New email</label>
		<input id="email-new" type="text" name="email" required>
		<br>
		<label for="pass-email">Password</label>
		<input id="pass-email" type="password" name="pass" required>
		<br>
		<input type="submit" value="Save">

		<input type="hidden" name="type" value="emailchange">
		<input type="hidden" name="token" value="<?= get_csrf() ?>">
	</form>
</fieldset>
