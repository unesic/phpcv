<?php

if(!isset($_SESSION)) {
	session_start();
}
require_once 'header.php';

include_once 'router.php';

include_once 'footer.php';