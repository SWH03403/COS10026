<?php
$use_session = $use_session ?? true;

require __DIR__ . '/database.php';
require __DIR__ . '/form.php';
if ($use_session) { require __DIR__ . '/session.php'; }
require __DIR__ . '/utils.php';
