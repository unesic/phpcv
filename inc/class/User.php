<?php


class User
{
	/**
	 * @var PDO
	 */
	
	private $db;
	
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function create($data)
	{
		/**
		 * Checks whether entered username and/or email are already in use
		 */
		$check_query = 'SELECT * FROM users WHERE username=? OR email=? LIMIT 1';
		$check_result = $this->db->prepare($check_query);
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
			$create = $this->db->prepare($insert_query);
			$create->execute([
				$data['username'],
				$data['password'],
				$data['email'],
			]);
			
			$this->login($data);
		} else {
			redirect('/u/register', 0, 'User with entered e-mail/username already exists!');
		}
		
	}
	
	public function login($data = null)
	{
		$login_query = 'SELECT username, password FROM users WHERE username=? AND password=? LIMIT 1';
		$login = $this->db->prepare($login_query);
		$login->execute([
			$data['username'],
			$data['password'],
		]);
		
		$login_result = $login->fetchAll();
		
		if (!empty($login_result)) {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $data['username'];
			$_SESSION['user_id'] = $this->getUserID($data['username']);
			
			redirect('/', 1, 'You have successfully logged in!');
		} else {
			redirect('/u/login', 0, 'Something went wrong, please try again!');
		}
	}
	
	public function getUserID($username)
	{
		$query = 'SELECT user_id FROM users WHERE username=? LIMIT 1';
		$result = $this->db->prepare($query);
		$result->execute([
			$username,
		]);
		$result = $result->fetchAll();
		
		return $result[0]['user_id'];
	}
	
	public function getDb()
	{
		return $this->db;
	}
	
	public function getProfiles()
	{
		$query = 'SELECT * FROM profiles WHERE user_id=?';
		$get = $this->db->prepare($query);
		$get->execute([
			$_SESSION['user_id'],
		]);
		
		return $get->fetchAll();
	}
}