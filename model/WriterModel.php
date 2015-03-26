<?php

class WriterModel extends UserModel
{
	/**
	 * Private Variables
	 */
	private $role;

	/**
	 * Getters/Setters
	 */
	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	/**
	 * Constructor
	 * @param $name
	 * @param $password
	 * @param $id
	 */
	public function __construct($name, $password, $id = null)
	{
		parent::__construct($name, $password);
		$this->setRole("writer");

		if ($id !== null) {
			$lastId = $this->save();
			$this->setId($lastId);
		} else {
			$this->setId($id);
		}
	}

	/**
	 * Saves Object in Database
	 */
	public function save()
	{
		// Only save if id = null, means object does not exist so far
		if ($this->getId() === null) {
			// Get all parameters of Object
			$name = $this->getName();
			$password = $this->getPassword();
			$role = $this->getRole();

			// Define query
			$sql = "INSERT INTO user (name,password,role) VALUES (:name,:password,:role)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':password' => $password, ':role' => $role));

			// Return id of inserted row
			return Database::getInstance()->lastInsertId();
		}
	}

	/**
	 * Updates Object in Database
	 */
	public function update()
	{
		// Get all parameters of Object
		$name = $this->getName();
		$password = $this->getPassword();
		$role = $this->getRole();
		$id = $this->getId();

		// Define query
		$sql = "UPDATE user SET name= :name, password= :password, role= :role WHERE id= :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':name' => $name, ':password' => $password, ':role' => $role, ':id' => $id));

		// Return updated Object
		return $this;
	}

	/**
	 * Deletes Object in Database
	 */
	public function delete()
	{
		// get id of Object
		$id = $this->getId();

		// Define query
		$sql = "DELETE FROM user WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 