<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking Confirmation</title>
	<meta charset="utf-8">
	<meta name="description" content="Rohirrim Booking Form">
	<meta name="keywords" content="MiddleEarth, Tours, Rohan">
	<meta name="author" content="Grima Wormtongue">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/register.css">
</head>
<body>

<header>
	<h1>Rohirrim Tour Booking Confirmation</h1>
	<nav>
		<ul>
			<li><a href="construction.html">Home</a></li>
			<li><a href="construction.html">Accommodation</a></li>
			<li><a href="construction.html">Horse Riding</a></li>
			<li><a href="construction.html">Sight Seeing</a></li>
			<li><a href="register.html">Book</a></li>
		</ul>
	</nav>
</header>

<main>
<?php
	const SPECIES = [
		'D' => 'dwarf',
		'E' => 'elf',
		'H' => 'hobbit',
		'M' => 'human',
	];
	const FOOD = [
		'none' => true,

		'cram' => true,
		'ent' => true,
		'lembas' => true,
		'mushrooms' => true,
	];
	const ITEMS = [
		'accom' => 'accommodation',
		'4day' => 'a 4-day trip',
		'10day' => 'a 10-day trip',
	];

	$errors = [];
	function print_errors(): bool {
		global $errors;
		if (empty($errors)) { return true; }

		$count = count($errors);
		echo "<p>$count validation error(s) encountered:</p><ul>";
		foreach ($errors as $err) { echo "<li>$err!</li>"; }
		echo "</ul>";
		return false;
	}
	function err(string $msg) {
		global $errors;
		array_push($errors, $msg);
	}

	function check_set(string $field, ?string $pretty = null): bool {
		$set = isset($_POST[$field]);
		$pretty = isset($pretty)? $pretty : ucfirst($field);
		if (!$set) { err("$pretty must be set"); }
		return $set;
	}
	function check_name(string $type) {
		$field = "{$type}name";
		$pretty = ucfirst($type);
		$pretty = "$pretty name";

		if (!check_set($field, $pretty)) { return; }
		elseif (empty($_POST[$field])) { err("$pretty must not be empty"); }
		elseif (strlen($_POST[$field]) > 20) { err("$pretty must be no longer than 20 characters"); }
	}
	function check_date(string $field, ?string $pretty = null): ?DateTime {
		$pretty = isset($pretty)? $pretty : ucfirst($field);
		if (!check_set($field, $pretty)) { return null; }
		try { return new DateTime($_POST[$field]); }
		catch (Exception $_) { err("$pretty must be valid"); return null; }
	}

	check_name('first');
	check_name('last');
	if (check_set('age') && !ctype_digit($_POST['age'])) { err('Age must be a number'); }
	if (check_set('species') && !isset(SPECIES[$_POST['species']])) { err('Unknown species'); }

	$no_booking = array_all(ITEMS, fn($_, $k) => !isset($_POST[$k]));
	if ($no_booking) { err('A booking item must be placed for your trip'); }

	$food = $_POST['food'] ?? 'none';
	if (!isset(FOOD[$food])) { err('Unknown preferred food type'); }

	$start = check_date('bookday', 'Book day');

	if (check_set('partysize', 'Party size') && !ctype_digit($_POST['partysize']))
	{ err('Party size must be a number'); }

	if (print_errors()) {
		$species = SPECIES[$_POST['species']];
		$items = array_filter(ITEMS, fn($k) => isset($_POST[$k]), ARRAY_FILTER_USE_KEY);
		$items = array_map(fn($k) => ITEMS[$k], array_keys($items));
		$items = join(', ', $items);
		echo "<p>You are {$_POST['firstname']} {$_POST['lastname']}, a {$_POST['age']}-year-old ".
			"$species.</p><p>You have booked for: $items.";
	}
?>
</main>

<footer>
	<div>
		<h1 class="fineprint">Conditions Apply</h1>
		<p class="fineprint">Rohirrim Dude Ranch management takes no responsiblity for any injury, beheadings, spells (sleeping or otherwise), spider-bites suffered by guests, or for anything whatsoever.</p>
	</div>
	<p id="contact">Any enquiries please email the <a href="mailto:something@something.com">manager</a></p>
</footer>
</body>
</html>
