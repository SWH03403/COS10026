<?php
function render_row(array $cells, bool $header = false) {
	$t = $header? 'th' : 'td';
	echo "<tr>";
	foreach ($cells as $cell) { echo "<$t>$cell</$t>"; }
	echo "</tr>";
}

$db = $opts['db'];
$model = trim($opts['query']);

$cars = $db->query("SELECT * FROM car WHERE model LIKE '%' || ?1 || '%'", [$model]);
if (empty($cars)) { echo "<p>🚫 No matching cars found.</p>"; return; }
$count = count($cars);
echo "<p>Found <b>{$count}</b> matching car(s):</p>";
echo '<table border="1" cellpadding="5">';
render_row(['ID', 'Make', 'Model', 'Price', 'Year'], true);
foreach ($cars as $car) {
	$price = $car['price'] / 100;
	render_row([$car['id'], $car['make'], $car['model'], "\$$price", $car['year']]);
}
echo '</table>';
