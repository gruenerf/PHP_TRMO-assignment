<?php

class Database
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "urban_dictionary";

	/**
	 * Getters
	 */
	public function getPassword()
	{
		return $this->password;
	}

	public function getServername()
	{
		return $this->servername;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getDatabase()
	{
		return $this->database;
	}


	/**
	 * static instance
	 */
	private static $databaseInstance = null;

	/**
	 * Empty constructor for singleton
	 */
	public function __construct()
	{
		try {
			$conn = new PDO("mysql:host=" . $this->getServername() . ";dbname=" . $this->getDatabase(), $this->getUsername(), $this->getPassword());
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			self::$databaseInstance = $conn;
		} catch
		(PDOException $e) {
			echo "Connection to database failed: " . $e->getMessage();
		}

	}

	/**
	 *  Singleton returns the one instance
	 */
	public static function getInstance()
	{
		if (self::$databaseInstance == null) {
			new Database();
		}

		return self::$databaseInstance;
	}
}