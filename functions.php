<?php

// Redirect function with status message
function redirect($uri, $status = NULL, $message = NULL) {
	if ($status !== NULL) {
		$status === 1 ?
			setcookie('status', 'success', time() + 1, '/') :
			setcookie('status', 'danger', time() + 1, '/');
		
		$message === null ?
			setcookie('message', 'Something went wrong!', time() + 1, '/') :
			setcookie('message', $message, time() + 1, '/');
	}
	
	if (LOCAL) $uri = '/phpcv' . $uri;
	
	header('Location: ' . $uri);
	exit();
}

// Authentication function
function authenticate() {
	if ($_SESSION['logged_in'] === false || $_SESSION['logged_in'] === null) {
		redirect('/u/login', 0, 'Please login to get access!');
	} else {
		return;
	}
}

// Class autoloader
function class_autoload($class) {
	$path = ABSPATH . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR;

	if (file_exists($path . $class . '.php')) {
		include_once($path . $class . '.php');
	}
}