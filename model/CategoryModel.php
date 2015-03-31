<?php


class CategoryModel implements CategoryModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name;

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

	/**
	 * Constructor
	 * @param $name
	 * @param null $id
	 */
	public function __construct($name, $id = null)
	{
		$this->name= $name;

		if($id !== null){
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
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO category (name) VALUES (:name)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {
			// Define query
			$sql = "UPDATE category SET name= :name WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':id' => $id));
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