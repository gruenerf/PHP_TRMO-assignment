<?php

use ErrorModel as Error;

class ErrorRepository implements ErrorRepositoryInterface
{
	/**
	 * Creates one or many error objects
	 * @param $errormessage
	 * @return array|ErrorModel|mixed
	 */
	public function create($errormessage)
	{
		$error = new Error($errormessage);
		return $error->save();
	}

	/**
	 * Returns an Object by the id
	 * @param $id
	 * @return ErrorModel|null
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM error WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Error($row['errormessage'], $row['id']);
		} else {
			return null;
		}
	}

	/**
	 * Returns an array with all existing objects
	 * @return array|null
	 */
	public function getAll()
	{
		// Define query
		$sql = "SELECT * FROM error";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Error($row['errormessage'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}
}