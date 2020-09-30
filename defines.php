<?php

// Database
define('DB_NAME', 'phpcv');
define('DB_HOST', 'localhost');
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST);
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_OPTIONS', [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

define('ABSPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'phpcv' . DIRECTORY_SEPARATOR);
define('LOCAL', true);

define('PATH', LOCAL ? '/phpcv' : '');

$PAGE_TITLE = 'PHP CV';

date_default_timezone_set('Europe/Belgrade');
define('DATE_FORMAT', 'Y-m-d H:i:s');