<?php


class User
{
	public static function create(PDO $db, $data)
	{
		/**
		 * Checks whether entered username and/or email are already in use
		 */
		$check_query = 'SELECT * FROM users WHERE username=? OR email=? LIMIT 1';
		$check_result = $db->prepare($check_query);
		$check_result->execute([
			$data['username'],
			$data['email'],
		]);
		$check_result = $check_result->fetchAll();
		
		/**
		 * If check result set is empty, register new user,
		 * If check result set is not empty, throw an error
		 */
		if (empty($check_result)) {
			$insert_query = 'INSERT INTO `users` (`username`, `password`, `email`) VALUES (?, ?, ?)';
			$create = $db->prepare($insert_query);
			$create->execute([
				$data['username'],
				$data['password'],
				$data['email'],
			]);
			
			self::login($db, $data);
		} else {
			redirect('/u/register', 0, 'User with entered e-mail/username already exists!');
		}
		
	}
	
	public static function login(PDO $db, $data = null)
	{
		$query = 'SELECT username, password FROM users WHERE username=? AND password=? LIMIT 1';
		$login = $db->prepare($query);
		$login->execute([
			$data['username'],
			$data['password'],
		]);
		
		$result = $login->fetchAll();
		
		if (!empty($result)) {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $data['username'];
			$_SESSION['user_id'] = self::getID($db, $data['username']);
			
			redirect('/', 1, 'You have successfully logged in!');
		} else {
			redirect('/u/login', 0, 'Something went wrong, please try again!');
		}
	}
	
	public static function logout()
	{
		$_SESSION = array();
		$_SESSION['logged_in'] = false;
		
		redirect('/', 1, 'You\'re logged out!');
	}
	
	public static function getID(PDO $db, $username)
	{
		$query = 'SELECT id FROM users WHERE username=? LIMIT 1';
		$result = $db->prepare($query);
		$result->execute([
			$username,
		]);
		$result = $result->fetchAll();
		
		return $result[0]['id'];
	}
	
	public static function hasProfile(PDO $db)
	{
		$query = 'SELECT id FROM profiles WHERE user_id=?';
		$conn = $db->prepare($query);
		$conn->execute([
			$_SESSION['user_id'],
		]);
		
		return $conn->fetchAll();
	}
}