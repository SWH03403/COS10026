<form method="get">
	<label for="search-model">Search model:</label>
	<input id="search-model" type="text" name="model"
		<?php if (!empty($opts['query'])) { echo "value=\"{$opts['query']}\""; } ?>
		required>
	<input type="submit" value=">">
</form>
