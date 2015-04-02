<?php

use TopicModel as Topic;
use CategoryModel as Category;

class TopicModel implements TopicModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name, $category_id;

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

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function setCategoryId($category_id)
	{
		$this->category_id = $category_id;
	}


	/**
	 * Constructor
	 *
	 * @param $name
	 * @param $category_id
	 * @param null $id
	 */
	public function __construct($name, $category_id, $id = null)
	{
		$this->name = $name;
		$this->category_id = $category_id;

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
		$category_id = $this->getCategoryId();
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO topic (name, category_id) VALUES (:name, :category_id)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':category_id' => $category_id));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {
			// Define query
			$sql = "UPDATE topic SET name= :name, category_id= :category_id WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':name' => $name, ':category_id' => $category_id, ':id' => $id));
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
		$sql = "DELETE FROM topic WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 