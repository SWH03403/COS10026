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
	$marks = [85, 85, 95];
	$marks[1] = 90;
	$ave = array_sum($marks) / count($marks);
	$status = $ave >= 50? "PASSED":"FAILED";
	echo "<p>The average score is $ave. You $status.</p>";
?>
</body>
</html>
