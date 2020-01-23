<?php

$request = $_SERVER['REQUEST_URI'];

if (strpos($request, '?')) {
	$request = substr($request, 0, strpos($request, '?'));
}

$request = str_replace('/phpcv', '', $request);


switch ($request) {
	case '' :
		redirect('/');
		break;
	case '/' :
		include_once 'home.php';
		break;
	case '/u/register' :
	case '/u/register/' :
		include_once 'views/user/register.php';
		break;
	case '/u/login' :
	case '/u/login/' :
		include_once 'views/user/login.php';
		break;
	case '/p' :
	case '/p/' :
		include_once 'views/profile/view.php';
		break;
	case '/p/create' :
	case '/p/create/' :
		include_once 'views/profile/create.php';
		break;
	case '/logout' :
	case '/logout/' :
		User::logout();
		break;
	default :
		redirect('/');
		break;
}