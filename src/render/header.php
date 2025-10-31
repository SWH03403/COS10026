<header>
	<h1>Generic page header</h1>
	<nav>
		<?php if (has_user()) {
			echo '<a href="/logout">Logout</a>';
			echo $opts['nav'];
		} ?>
	</nav>
</header>
