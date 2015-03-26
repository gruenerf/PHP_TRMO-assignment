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
	 * @param string $save
	 */
	public function __construct($errormessage, $id = null, $save = "true")
	{
		$this->setErrormessage($errormessage);

		if ($save) {
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
			$errormessage = $this->getErrormessage();

			// Define query
			$sql = "INSERT INTO error (errormessage) VALUES (:errormessage)";

			// Prepare database and execute Query
			$query = Database::getInstance()->prepare($sql);
			$query->execute(array(':errormessage' => $errormessage));

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
		$errormessage = $this->getErrormessage();
		$id = $this->getId();

		// Define query
		$sql = "UPDATE error SET errormessage= :errormessage WHERE id= :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':errormessage' => $errormessage, ':id' => $id));

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
		$sql = "DELETE FROM error WHERE id = :id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
	}
}