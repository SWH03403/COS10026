<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Using PHP variables, arrays, and operators</title>
</head>
<body>
	<h1>PHP variables, arrays, and operators</h1>
<?php
	function print_weekdays(string $lang, array $days) {
		$days = join(', ', $days);
		echo "<p>The days of the week in $lang are:<br>$days.</p>";
	}

	$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
	print_weekdays('English', $days);
	$days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
	print_weekdays('French', $days);
?>
</body>
</html>
