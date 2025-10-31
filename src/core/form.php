<?php
function from_form(string $k): string { return trim($_POST[$k] ?? ''); }
function from_query(string $k): string { return trim($_GET[$k] ?? ''); }
