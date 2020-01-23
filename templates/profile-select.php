<?php

if (isset($_POST['submit'])) {
	// TODO: Add functionality to use user data field
	
	if (Profile::hasCV($db, $_POST['profile'])) {
		
		$cvid = CV::get($db, $_POST['profile']);
		$name = Profile::get($db, $_POST['profile'])['name'];
		
		if (isset($_POST['default'])) {
			setcookie('CURRENT_CV', $cvid, time() + (3600 * 72));
		} else {
			setcookie('CURRENT_CV', $cvid, time() + 3600);
		}
		
		redirect('/', 1, 'Currently editing CV for profile <strong>' . $name . '</strong>');
		
	} else {

		CV::create($db, $_POST['profile']);
		
	}
	
} else {
	include_once 'templates/profile-select-dialog.php';
}