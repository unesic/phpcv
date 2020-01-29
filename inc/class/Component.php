<?php


class Component
{
	public static function create(PDO $db, $data)
	{
		$query = 'INSERT INTO components (`type`, `content`, `cv_id`) VALUES (?, ?, ?)';
		$create = $db->prepare($query);
		$create->execute([
			$data['type'],
			$data['content'],
			(int)$data['cv_id'],
		]);
		
		redirect('/');
	}
	
	public static function get(PDO $db, $id)
	{
		$query = 'SELECT id, type, content FROM components WHERE id=? LIMIT 1';
		$get = $db->prepare($query);
		$get->execute([
			(int)$id,
		]);
		
		return $get->fetchAll()[0];
	}
	
	public static function update(PDO $db, $data)
	{
		$query = 'UPDATE components SET content=? WHERE id=?';
		$update = $db->prepare($query);
		$update->execute([
			$data['content'],
			(int)$data['id'],
		]);
	}
	
	public static function display($component)
	{
		$path = 'views/component/components/' . $component['type'] . '.php';

		if (file_exists($path)) {
			include $path;
		}
	}
	
	/**
	 * @param $db
	 * @return array
	 */
	public static function getComponents(PDO $db)
	{
		$query = 'SELECT * FROM components WHERE cv_id=?';
		$result = $db->prepare($query);
		$result->execute([
			$_COOKIE['CURRENT_CV'],
		]);
		
		return $result->fetchAll();
	}
}