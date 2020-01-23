<?php

// Redirect function with status message
/**
 * @param $uri
 * @param null $status
 * @param null $message
 */
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

function checkRelation(PDO $db, $relation) {
	$uid = NULL;
	$pid = NULL;
	
	if ($relation === 'user-profile' || $relation === 'profile-user') {
		$uid = User::getID($db, $_SESSION['username']);
		$pid = Profile::getUserId($db, $_GET['pid']);
		
		if ($uid !== $pid) {
			redirect('/', 0, 'You don\'t have access to requested data!');
		}
	} else if ($relation === 'user-cv' || $relation === 'cv-user') {
		$uid = User::getID($db, $_SESSION['username']);
		$cid = CV::getProfileId($db, $_COOKIE['CURRENT_CV']);
		$pid = Profile::getUserId($db, $cid);
		
		if ($uid !== $pid) {
			setcookie('CURRENT_CV', '', time() - 1);
			redirect('/', 0, 'You don\'t have access to requested data!');
		}
	}
}