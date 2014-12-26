<?php

class DB
{
	private static $_instance;
	private $_pdo;

	private function __construct()
	{
		try {
			$this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
			echo 'great success';
		} catch (PDOException $e) {
			throw new PDOException('Error connecting to database ' . $e->getMessage());
		}
	}

	public static function getInstance()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}

		return self::$_instance;
	}
}