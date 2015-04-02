<?php

class EntryModel implements EntryModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $title, $content, $user_id, $topic_id;

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

	public function getUserId()
	{
		return $this->user_id;
	}

	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getTopicId()
	{
		return $this->topic_id;
	}

	public function setTopicId($topic_id)
	{
		$this->topic_id = $topic_id;
	}


	/**
	 * Constructor
	 * @param $id
	 * @param $title
	 * @param $content
	 */
	public function __construct($title, $content, $user_id, $topic_id, $id = null)
	{
		$this->title = $title;
		$this->content = $content;
		$this->user_id = $user_id;
		$this->topic_id = $topic_id;

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
		$title = $this->getTitle();
		$content = $this->getContent();
		$user_id = $this->getUserId();
		$topic_id = $this->getTopicId();
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO entry (title,content,user_id,topic_id) VALUES (:title,:content,:user_id,:topic_id)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':title' => $title, ':content' => $content, ':user_id' => $user_id, ':topic_id' => $topic_id));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {
			// Define query
			$sql = "UPDATE entry SET title= :title, content= :content, user_id= :user_id,topic_id= :topic_id WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':title' => $title, ':content' => $content, ':id' => $id, ':user_id' => $user_id, ':topic_id' => $topic_id));
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
		$sql = "DELETE FROM entry WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
} 