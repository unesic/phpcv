<?php


class Component
{
	/**
	 * @param PDO $db
	 * @param $data
	 */
	public static function create(PDO $db, $data)
	{
		try {
			$query = 'INSERT INTO components (`type`, `content`, `cv_id`) VALUES (?, ?, ?)';
			$create = $db->prepare($query);
			$create->execute([
				$data['type'],
				$data['content'],
				(int)$data['cv_id'],
			]);
			
			redirect('/');
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
			$query = 'SELECT id, type, content FROM components WHERE id=? LIMIT 1';
			$get = $db->prepare($query);
			$get->execute([
				(int)$id,
			]);
			
			return $get->fetchAll()[0];
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $data
	 */
	public static function update(PDO $db, $data)
	{
		try {
			$query = 'UPDATE components SET content=?, date_updated=? WHERE id=?';
			$update = $db->prepare($query);
			$update->execute([
				$data['content'],
				date(DATE_FORMAT),
				(int)$data['id'],
			]);
		} catch (Exception $e) {
			echo 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param $component
	 */
	public static function display($component)
	{
		$path = 'views/component/components/' . $component['type'] . '.php';

		if (file_exists($path)) {
			include $path;
		} else {
			echo 'Component path not found!';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return bool|string
	 */
	public static function delete(PDO $db, $id)
	{
		try {
			$query = 'DELETE FROM components WHERE id=?';
			$conn = $db->prepare($query);
			$conn->execute([
				(int)$id,
			]);
			
			return true;
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return bool|string
	 */
	public static function deleteAll(PDO $db, $id)
	{
		try {
			$query = 'DELETE FROM components WHERE cv_id=?';
			$conn = $db->prepare($query);
			$conn->execute([
				(int)$id,
			]);
			
			return true;
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
	
	
	/**
	 * @param PDO $db
	 * @param $id
	 * @return array|string
	 */
	public static function getComponents(PDO $db, $id)
	{
		try {
			$query = 'SELECT * FROM components WHERE cv_id=?';
			$result = $db->prepare($query);
			$result->execute([
				(int)$id,
			]);
			
			return $result->fetchAll();
		} catch (Exception $e) {
			return 'Error!: ' . $e->getMessage() . '<br/>';
		}
	}
}