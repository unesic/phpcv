<?php

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
	redirect('/', 1, 'You are logged in!');
}

$PAGE_TITLE = 'Log in | PHP CV';

if (isset($_POST['submit'])) {
	$data['username'] = $_POST['username'];
	$data['password'] = $_POST['password'];
	
	User::login($db, $data);
} else {
	include_once 'views/user/login-form.php';
}