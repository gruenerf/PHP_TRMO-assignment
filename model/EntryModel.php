<?php

class EntryModel implements EntryModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $title, $content;

	/**
	 * Getters/Setters
	 */
	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * Constructor
	 * @param $id
	 * @param $title
	 * @param $content
	 */
	public function __construct($title, $content, $id = null)
	{
		$this->setTitle($title);
		$this->setContent($content);

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
			$title = $this->getTitle();
			$content = $this->getContent();

			// Define query
			$sql = "INSERT INTO entry (title,content) VALUES (:title,:content)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':title' => $title, ':content' => $content));

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
		$title = $this->getTitle();
		$content = $this->getContent();
		$id = $this->getId();

		// Define query
		$sql = "UPDATE entry SET title= :title, content= :content WHERE id= :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':title' => $title, ':content' => $content, ':id' => $id));

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
		$sql = "DELETE FROM entry WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 