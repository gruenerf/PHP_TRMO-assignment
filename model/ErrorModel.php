<?php

class ErrorModel implements ErrorModelInterface
{

	/**
	 * Private variables
	 */

	private $id, $date, $errormessage;

	/**
	 * Getter / Setter
	 */

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function getErrormessage()
	{
		return $this->errormessage;
	}

	public function setErrormessage($errormessage)
	{
		$this->errormessage = $errormessage;
	}

	/**
	 * Constructor
	 * @param $errormessage
	 * @param null $id
	 */
	public function __construct($errormessage, $id = null)
	{
		$this->errormessage = $errormessage;

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
		$errormessage = $this->getErrormessage();
		$id = $this->getId();

		// Create object in Database if id = null, else update existing object
		if ($id === null) {

			// Define query
			$sql = "INSERT INTO error (errormessage) VALUES (:errormessage)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':errormessage' => $errormessage));

			// Set Object id to id of inserted row
			$this->setId(Database::getInstance()->lastInsertId());
		} else {
			// Define query
			$sql = "UPDATE error SET errormessage= :errormessage WHERE id= :id";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':errormessage' => $errormessage, ':id' => $id));
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
		$sql = "DELETE FROM error WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
}