<?php


class Profile
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
		
		$create = $this->db->prepare($query);
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
	
	public function create_cv($profile_id)
	{
		// Creates new entry in CVS table
		$query = 'INSERT INTO cvs (profile_id) VALUES (?)';
		$create = $this->db->prepare($query);
		$create->execute([
			(int)$profile_id,
			]);

		// Updates current profile property
		$query = 'UPDATE profiles
						SET has_cvs = IF(has_cvs = NULL, 1, 1)
						WHERE id=?';
		$update = $this->db->prepare($query);
		$update->execute([
			(int)$profile_id,
		]);

		$query = 'SELECT id FROM cvs WHERE profile_id=? ORDER BY id DESC LIMIT 1';
		$result = $this->db->prepare($query);
		$result->execute([
			(int)$profile_id,
		]);

		setcookie('CURRENT_CV', $result->fetchAll()[0]['id']);

		redirect('/', 1, 'CV Created successfully!');
	}
	
	public function get($id)
	{
		$query = 'SELECT * FROM profiles WHERE id=?';
		$result = $this->db->prepare($query);
		$result->execute([
			(int)$id,
		]);
		
		$result = $result->fetchAll();
		
		return $result[0];
	}
	
	public function update($data)
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
		
		$update = $this->db->prepare($query);
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
	
	public function delete($id)
	{
		$query = 'DELETE FROM profiles WHERE id=?';
		$conn = $this->db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		$query = 'DELETE FROM cvs WHERE profile_id=?';
		$conn = $this->db->prepare($query);
		$conn->execute([
			(int)$id,
		]);
		
		redirect('/p/', 1, 'Profile deleted!');
	}
}