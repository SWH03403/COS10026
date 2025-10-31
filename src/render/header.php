<header>
	<h1>Generic page header</h1>
	<nav>
		<?php if (has_user()) {
			echo '<a href="/logout">Logout</a><br>';
			if (get_uri() != 'edit') { echo '<a href="/edit">Edit profile</a>'; }
		} ?>
	</nav>
</header>
