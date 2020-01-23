<?php

authenticate();

// Profile update
if (isset($_POST['submit'])) {
	$data['name']               = $_POST['name'];
	$data['title']              = $_POST['title'];
	$data['date_of_birth']      = $_POST['date_of_birth'];
	$data['phone_number']       = $_POST['phone_number'];
	$data['email']              = $_POST['email'];
	$data['country']            = $_POST['country'];
	$data['city']               = $_POST['city'];
	$data['social_networks']    = $_POST['linked_in'] . ',' . $_POST['github'];
	$data['pid']                = $_GET['pid'];
	
	Profile::update($db, $data);
}


// View all profiles (view, edit, remove)

if (isset($_GET['view'])) {
	
	checkRelation($db, 'user-profile');
	$profile = Profile::get($db, $_GET['pid']);
	
	include_once 'views/profile/view-single.php';
	
} else if (isset($_GET['edit'])) {
	
	checkRelation($db, 'user-profile');
	$profile = Profile::get($db, $_GET['pid']);
	
	include_once 'views/profile/edit.php';
	
} else if (isset($_GET['remove'])) {
	
	checkRelation($db, 'user-profile');
	Profile::delete($db, $_GET['pid']);
	
} else {
	
	$profiles = Profile::getProfiles($db);
	include_once 'views/profile/view-all.php';
	
}