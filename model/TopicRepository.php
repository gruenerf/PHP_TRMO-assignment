<?php

use TopicModel as Topic;

class TopicRepository implements TopicRepositorynterface{

	/**
	 * Creates a new Object
	 * @param $name
	 * @return $this
	 *
	 * TODO: add the category
	 */
	public function create($name)
	{
		// Check if topic already exists
		if(!$this->checkIfNameExists($name)){
			$topic = new Topic($name);
			return $topic->save();
		}
		else{
			return null;
		}
	}

	/**
	 * Updates an existing Object
	 * @param TopicModel $topic
	 * @return $this
	 */
	public function update(Topic $topic)
	{
		return $topic->save();
	}

	/**
	 * Deletes an Object
	 * @param TopicModel $topic
	 */
	public function delete(Topic $topic)
	{
		$topic->delete();
	}

	/**
	 * Checks if Topic already exists
	 * @param $name
	 * @return bool
	 */
	public function checkIfNameExists($name){
		// Define query
		$sql = "SELECT * FROM topic WHERE name =:name";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':name' => $name));
		$row = $query->fetch();

		if (!empty($row)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Returns an Object by the id
	 * @param $id
	 * @return null|TopicModel
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM topic WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Topic($row['name'], $row['id']);
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
		$sql = "SELECT * FROM topic";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Topic($row['name'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}
} 