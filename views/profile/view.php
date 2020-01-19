<?php

authenticate();

$profile = new Profile($db);

// Profile update
if (isset($_POST['submit'])) {
	$data['name']               = $_POST['first_name'] . ' ' . $_POST['last_name'];
	$data['title']              = $_POST['title'];
	$data['date_of_birth']      = $_POST['date_of_birth'];
	$data['phone_number']       = $_POST['phone_number'];
	$data['email']              = $_POST['email'];
	$data['address']            = $_POST['country'] . ',' . $_POST['zip'] . ' ' . $_POST['city'];
	$data['social_networks']    = $_POST['linked_in'] . ',' . $_POST['github'];
	$data['pid'] = $_GET['pid'];
	
	$profile->update($data);
}


// View all profiles (view, edit, remove)
if (isset($_GET['view'])) {
	
	$profile = $profile->get($_GET['pid']);
	include_once 'views/profile/view-single.php';
	
} else if (isset($_GET['edit'])) {
	
	$profile = $profile->get($_GET['pid']);
	include_once 'views/profile/edit.php';
	
} else if (isset($_GET['remove'])) {
	
	$profile->delete($_GET['pid']);
	
} else {
	
	$profiles = $user->getProfiles();
	include_once 'views/profile/view-all.php';
	
}