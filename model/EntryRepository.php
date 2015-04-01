<?php

use EntryModel as Entry;

class EntryRepository implements EntryRepositoryInterface{

	/**
	 * Creates a new Object
	 * @param $title
	 * @param $content
	 * @return $this|null
	 *
	 * TODO: add topic
	 */
	public function create($title, $content)
	{
		// Check if Entry already exists
		if(!$this->checkIfTitleExists($title)){
			$entry = new Entry($title,$content);
			return $entry->save();
		}
		else{
			return null;
		}
	}

	/**
	 * Updates an existing Object
	 * @param EntryModel $entry
	 * @return $this
	 */
	public function update(Entry $entry)
	{
		return $entry->save();
	}

	/**
	 * Deletes an Object
	 * @param EntryModel $entry
	 */
	public function delete(Entry $entry)
	{
		$entry->delete();
	}

	/**
	 * Checks if Title already exists
	 * @param $title
	 * @return bool
	 */
	public function checkIfTitleExists($title){
		// Define query
		$sql = "SELECT * FROM entry WHERE title =:title";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':title' => $title));
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
	 * @return EntryModel|null
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM entry WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Entry($row['title'], $row['content'], $row['id']);
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
		$sql = "SELECT * FROM entry";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Entry($row['title'], $row['content'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}
} 