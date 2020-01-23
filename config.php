<?php

include_once 'defines.php';
include_once 'functions.php';

spl_autoload_register('class_autoload');

$db = Database::create();