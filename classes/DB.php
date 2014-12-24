<?php

class DB
{
	private static $_instance;
	private $_pdo,
			$_query,
			$_count = 0,
			$_results,
			$_error = FALSE;

	private function __construct()
	{
		try {
			$this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		} catch (PDOException $e) {
			throw new PDOException('Error connecting to database' . $e->getMessage());
		}
	}

	public static function getInstance()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	private function query($sql, $params)
	{
		$this->_error = FALSE;

		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;

			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}				
			}

			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = TRUE;
			}
		}

		return $this;
	}

	private function action($action, $table, $where)
	{
		if (count($where === 3)) {
			$operators = array('=', '<', '<=', '>', '>=');

			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];

			if (in_array($operator, $operators)) {
				$sql = "{$action} FROM `{$table}` WHERE `{$field}` {$operator} ?";

				if (!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}
		}

		return FALSE;
	}

	public function get($table, $where)
	{
		return $this->action("SELECT *", $table, $where);
	}

	public function results()
	{
		return $this->_results;
	}

	public function first()
	{
		return $this->results()[0];
	}

	public function count()
	{
		return $this->_count;
	}

	public function error()
	{
		return $this->_error;
	}
}