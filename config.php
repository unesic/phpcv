<?php

include_once __DIR__ . '/defines.php';
include_once __DIR__ . '/functions.php';

spl_autoload_register('class_autoload');

$db = Database::create();
$user = new User($db);