<header>
	<h1>Generic page header</h1>
	<nav>
		<?php if (has_user()) { echo '<a href="/logout">Logout</a>'; } ?>
		<?=	$opts['nav'] ?>
	</nav>
</header>
