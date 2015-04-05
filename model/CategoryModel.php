<?php


class CategoryModel implements CategoryModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name, $user_id;

	/**
	 * Getters / Setters
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

	public function getUserId()
	{
		return $this->user_id;
	}

	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	/**
	 * Constructor
	 * @param $name
	 * @param null $id
	 */
	public function __construct($name, $user_id, $id = null)
	{
		$this->name = $name;
		$this->user_id = $user_id;

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
		$user_id = $this->getUserId();
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO category (name, user_id) VALUES (:name, :user_id)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':user_id' => $user_id));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {
			// Define query
			$sql = "UPDATE category SET name= :name, user_id = :user_id WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':user_id' => $user_id, ':id' => $id));
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
		$sql = "DELETE FROM category WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 