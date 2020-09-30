<?php

class Database
{
	private static $instance;
	
	public static function create()
	{
		try {
			// Create database if it doesn't exist
			$sql = file_get_contents("dbcreate.sql");
			$conn = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASSWORD, DB_OPTIONS);
			$conn->exec($sql);
			$conn = NULL;
			
			self::$instance = new PDO(DB_DSN, DB_USER, DB_PASSWORD, DB_OPTIONS);
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage() . '<br/>';
			die();
		}
		
		return self::$instance;
	}
	
	public static function init()
	{
		try {
			self::$instance = new PDO(DB_DSN, DB_USER, DB_PASSWORD, DB_OPTIONS);
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage() . '<br/>';
			die();
		}
		
		return self::$instance;
	}
}