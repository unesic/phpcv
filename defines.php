<?php

// Database
define('DB_NAME', 'phpcv');
define('DB_HOST', 'localhost');
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST);
define('DB_USER', 'root');
define('DB_PASSWORD', 'Milkyway.123');

$PAGE_TITLE = 'PHP CV';

date_default_timezone_set('Europe/Belgrade');
define('DATE_FORMAT', 'Y-m-d H:i:s');