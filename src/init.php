<?php
declare(strict_types = 1);

define('PROJECT_DIR', dirname(__DIR__));
define('DATABASE_URL', PROJECT_DIR . '/db.sqlite');
define('MIGRATIONS_DIR', PROJECT_DIR . '/migrations');

require __DIR__ . '/core/init.php';
require __DIR__ . '/render/init.php';
require __DIR__ . '/routes/init.php';
