<?php


class Component
{
	/**
	 * @var PDO
	 */
	
	private $db;
	
	private $id;
	private $type;
	private $content;
	private $cv_id;
	
	/**
	 * Component constructor.
	 * @param $db
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	/**
	 * @param $component
	 */
	public function display()
	{
		$filePath = "views/components/{$this->type}.php";
		
		if (file_exists($filePath)) {
			include $filePath;
		}
	}
	
	/**
	 * @param $data
	 */
	public function create($data)
	{
		$query = 'INSERT INTO components (`type`, `content`, `cv_id`) VALUES (?, ?, ?)';
		$create = $this->db->prepare($query);
		$create->execute([
			$data['type'],
			$data['content'],
			(int)$data['cv_id'],
		]);
		
		redirect('/');
	}
	
	public function update()
	{
		$query = 'UPDATE components SET content=? WHERE id=?';
		$update = $this->db->prepare($query);
		$update->execute([
			$this->content,
			$this->id,
		]);
		
		redirect('/');
	}
	
	/**
	 * @return array
	 */
	public function getComponents()
	{
		$query = 'SELECT * FROM components WHERE cv_id=?';
		$result = $this->db->prepare($query);
		$result->execute([
			$_COOKIE['CURRENT_CV'],
		]);
		
		return $result->fetchAll();
	}
	
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	
	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}
	
	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}
	
	/**
	 * @param mixed $content
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	/**
	 * @return mixed
	 */
	public function getCvId()
	{
		return $this->cv_id;
	}
	
	/**
	 * @param mixed $cv_id
	 */
	public function setCvId($cv_id)
	{
		$this->cv_id = $cv_id;
	}
}

// TODO: Write a helper function for passing data to views - 'extract($data)'