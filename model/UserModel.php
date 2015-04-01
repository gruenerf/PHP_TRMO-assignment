<?php

class UserModel implements UserModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name, $password, $role;

	/**
	 * Getters/Setters
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

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
	 * @param $role
	 * @param null $id
	 */
	public function __construct($name, $password, $role, $id = null)
	{
		$this->name = $name;
		$this->password = $password;
		$this->role = $role;

		if ($id !== null) {
			$this->id = $id;
		}
	}

	/**
	 * Saves/Updates Object in Database
	 */
	public function save()
	{
		// Get all parameters of Object
		$name = $this->getName();
		$password = $this->getPassword();
		$role = $this->getRole();
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO user (name,password,role) VALUES (:name,:password,:role)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':password' => $password, ':role' => $role));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {

			// Define query
			$sql = "UPDATE user SET name= :name, password= :password, role= :role WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':password' => $password, ':role' => $role, ':id' => $id));

		}

		// Return saved/updated Object
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