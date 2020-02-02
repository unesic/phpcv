<?php

if (isset($_POST['id'])) {
	include_once '../../defines.php';
	include_once '../../inc/class/Database.php';
	include_once '../../inc/class/Component.php';
	
	$db = Database::init();
	
	Component::delete($db, $_POST['id']);
}