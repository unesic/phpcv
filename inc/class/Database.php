<?php

class Database
{
	private static $instance;
	
	public static function create()
	{
		try {
			self::$instance = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
			self::$instance->exec('set names utf8mb4_unicode_520_ci');
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print 'Error!: ' . $e->getMessage() . '<br/>';
			die();
		}
		
		return self::$instance;
	}
}