<?php


class CV
{
	public static function create(PDO $db, $profile_id)
	{
		// Creates new entry in CVS table
		$query = 'INSERT INTO cvs (profile_id) VALUES (?)';
		$create = $db->prepare($query);
		$create->execute([
			(int)$profile_id,
		]);
		
		// Updates current profile property
		$query = 'UPDATE profiles
						SET has_cvs = IF(has_cvs = NULL, 1, 1)
						WHERE id=?';
		$update = $db->prepare($query);
		$update->execute([
			(int)$profile_id,
		]);
		
		$query = 'SELECT id FROM cvs WHERE profile_id=? ORDER BY id DESC LIMIT 1';
		$result = $db->prepare($query);
		$result->execute([
			(int)$profile_id,
		]);
		
		setcookie('CURRENT_CV', $result->fetchAll()[0]['id']);
		
		redirect('/', 1, 'CV Created successfully!');
	}
	
	public static function get(PDO $db, $id)
	{
		$query = 'SELECT id FROM cvs WHERE profile_id=? LIMIT 1';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		return $conn->fetchAll()[0]['id'];
	}
	
	public static function getProfileId(PDO $db, $id)
	{
		$query = 'SELECT profile_id FROM cvs WHERE id=?';
		$conn = $db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		return $conn->fetchAll()[0]['profile_id'];
	}
}