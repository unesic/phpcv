<?php

if ($_SESSION['logged_in'] === true) {
	redirect('/', 1, 'You are logged in!');
}

$PAGE_TITLE = 'Log in | PHP CV';

if (isset($_POST['submit'])) {
	$data['username'] = $_POST['username'];
	$data['password'] = $_POST['password'];
	
	$user->login($data);
} else {
	include_once 'views/user/login-form.php';
}