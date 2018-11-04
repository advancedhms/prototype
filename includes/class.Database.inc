<?php

class Database {
	private $_connection;
	// store a single instance
	private static $_instance;

	/**
	*Get an instance of the database
	**/
	public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	*Magic construct method
	*Return a connection to the database
	**/
	function __construct() {
		$this->_connection = new MySQLi('localhost','root','','hms');
		//error handling
		if(mysqli_connect_error()) {
			trigger_error('cannot access database, :'.mysqli_connect_error, E_USER_ERROR);
		}
	}

	public function getConnection() {
		return $this->_connection;
	}
	private function __clone() {}

}


?>
