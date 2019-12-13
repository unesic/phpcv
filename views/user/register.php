<?php

if ($_SESSION['logged_in'] === true) {
	redirect('/', 1, 'You are logged in!');
}

$PAGE_TITLE = 'Registration | PHP CV';

if (isset($_POST['submit'])) {
	$data['username'] = $_POST['username'];
	$data['password'] = $_POST['password'];
	$data['email'] = $_POST['email'];
	
	$user->create($data);
} else {
	include_once 'views/user/register-form.php';
}