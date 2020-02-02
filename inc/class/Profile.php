<?php


class Profile
{
	/**
	 * @param PDO $db
	 * @param $data
	 */
	public static function create(PDO $db, $data)
	{
		try {
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
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $data
	 */
	public static function update(PDO $db, $data)
	{
		try {
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
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return mixed|string
	 */
	public static function get(PDO $db, $id)
	{
		try {
			$query = 'SELECT * FROM profiles WHERE id=?';
			$result = $db->prepare($query);
			$result->execute([
				(int)$id,
			]);
			
			return $result->fetchAll()[0];
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @return array|string
	 */
	public static function getProfiles(PDO $db)
	{
		try {
			$query = 'SELECT * FROM profiles WHERE user_id=?';
			$get = $db->prepare($query);
			$get->execute([
				$_SESSION['user_id'],
			]);
			
			return $get->fetchAll();
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 */
	public static function delete(PDO $db, $id)
	{
		try {
			$query = 'DELETE FROM profiles WHERE id=?';
			$conn = $db->prepare($query);
			$conn->execute([
				(int)$id,
			]);
			
			if (CV::delete($db, $id)) {
				redirect('/p/', 1, 'Profile deleted!');
			}
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return bool|mixed
	 */
	public static function getUserId(PDO $db, $id)
	{
		try {
			$query = 'SELECT user_id FROM profiles WHERE id=? LIMIT 1';
			$conn = $db->prepare($query);
			$conn->execute([
				(int)$id,
			]);
			
			return $conn->fetchAll()[0]['user_id'];
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
			
			return false;
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return bool|mixed
	 */
	public static function hasCV(PDO $db, $id)
	{
		try {
			$query = 'SELECT has_cvs FROM profiles WHERE id=? LIMIT 1';
			$conn = $db->prepare($query);
			$conn->execute([
				(int)$id,
			]);
			
			return $conn->fetchAll()[0]['has_cvs'];
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
			
			return false;
		}
	}
}