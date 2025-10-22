<?php
	function redirect(string $path) { header("Location: $path.php"); exit; }

	function clean(string $data): string {
		return htmlspecialchars(trim($data), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
?>
