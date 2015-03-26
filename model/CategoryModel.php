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
		$this->setName($name);

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
		if ($this->getId() == null) {
			// Get all parameters of Object
			$name = $this->getName();

			// Define query
			$sql = "INSERT INTO category (name) VALUES (:name)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name));

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
		$id = $this->getId();

		// Define query
		$sql = "UPDATE category SET name= :name WHERE id= :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':name' => $name, ':id' => $id));

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
		$sql = "DELETE FROM category WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 