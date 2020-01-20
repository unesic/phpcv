<?php

if (isset($_POST['submit'])) {
	// TODO: Add functionality to use user data field
	
	if ($_POST['default'] === true) {
	    setcookie('CURRENT_PROFILE', (int)$_POST['profile']);
	}
	
	$profile = new Profile($db);
	$profile->create_cv((int)$_POST['profile']);
} else {
	include_once 'templates/profile-select-dialog.php';
}