<?php

authenticate();

$PAGE_TITLE = 'New profile';

if (isset($_POST['submit'])) {
	$user = new User($db);
	$data['user_id'] = $user->getUserID($_SESSION['username']);
	unset($user);
	
	$data['name']               = $_POST['name'];
	$data['title']              = $_POST['title'];
	$data['date_of_birth']      = $_POST['date_of_birth'];
	$data['phone_number']       = $_POST['phone_number'];
	$data['email']              = $_POST['email'];
	$data['country']            = $_POST['country'];
	$data['city']               = $_POST['city'];
	$data['social_networks']    = $_POST['linked_in'] . ',' . $_POST['github'];
	
	$profile = new Profile($db);
	$profile->create($data);
} else {
	include_once 'views/profile/create-form.php';
}