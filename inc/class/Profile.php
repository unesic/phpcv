<?php


class Profile
{
	public static function create(PDO $db, $data)
	{
		$query = 'INSERT INTO profiles (
                        user_id,
                        name,
                        title,
                        date_of_birth,
                        phone_number,
                        email,
                        country,
                      	city,
                        social_networks)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		
		$create = $db->prepare($query);
		$create->execute([
			$data['user_id'],
			$data['name'],
			$data['title'],
			$data['date_of_birth'],
			$data['phone_number'],
			$data['email'],
			$data['country'],
			$data['city'],
			$data['social_networks'],
		]);
		
		redirect('/', 1, 'Profile created!');
	}
	
	public static function update(PDO $db, $data)
	{
		$query = 'UPDATE profiles SET
                        name=?,
                        title=?,
                        date_of_birth=?,
                        phone_number=?,
                        email=?,
                        country=?,
                        city=?,
                        social_networks=?,
                        date_updated=?
                        WHERE id=?';
		
		$update = $db->prepare($query);
		$update->execute([
			$data['name'],
			$data['title'],
			$data['date_of_birth'],
			$data['phone_number'],
			$data['email'],
			$data['country'],
			$data['city'],
			$data['social_networks'],
			date(DATE_FORMAT),
			(int)$data['pid'],
		]);
		
		redirect('/p/', 1, 'Profile updated!');
	}
	
	public static function get(PDO $db, $id)
	{
		$query = 'SELECT * FROM profiles WHERE id=?';
		$result = $db->prepare($query);
		$result->execute([
			(int)$id,
		]);
		
		$result = $result->fetchAll();
		
		return $result[0];
	}
	
	public static function getProfiles(PDO $db)
	{
		$query = 'SELECT * FROM profiles WHERE user_id=?';
		$get = $db->prepare($query);
		$get->execute([
			$_SESSION['user_id'],
		]);
		
		return $get->fetchAll();
	}
	
	public static function delete(PDO $db, $id)
	{
		$query = 'DELETE FROM profiles WHERE id=?';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		$query = 'DELETE FROM cvs WHERE profile_id=?';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		redirect('/p/', 1, 'Profile deleted!');
	}
	
	public static function getUserId(PDO $db, $id)
	{
		$query = 'SELECT user_id FROM profiles WHERE id=? LIMIT 1';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		return $conn->fetchAll()[0]['user_id'];
	}
	
	public static function hasCV(PDO $db, $id)
	{
		$query = 'SELECT has_cvs FROM profiles WHERE id=? LIMIT 1';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		return $conn->fetchAll()[0]['has_cvs'];
	}
}