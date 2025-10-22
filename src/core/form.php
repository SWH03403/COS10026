<?php
	function get_formfield(string $k): string { return clean($_POST[$k] ?? ''); }
	function get_parameter(string $k): string { return clean($_GET[$k]  ?? ''); }
?>
