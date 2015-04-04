<?php

use TopicModel as Topic;
use CategoryModel as Category;

class TopicRepository implements TopicRepositoryInterface
{
	/**
	 * static instance
	 */
	private static $topicRepository = null;

	/**
	 * Empty constructor for singleton
	 */
	public function __construct()
	{
	}

	/**
	 *  Singleton returns the one instance
	 */
	public static function getInstance()
	{
		if (self::$topicRepository == null) {
			self::$topicRepository = new TopicRepository();
		}

		return self::$topicRepository;
	}

	/**
	 * Creates a new Object and reference to Category
	 * @param $name
	 * @param CategoryModel $category
	 * @return $this|null
	 */
	public function create($name, Category $category)
	{
		// Check if topic already exists
		if (!$this->checkIfNameExists($name)) {
			$topic = new Topic($name, $category->getId());

			// Return saved entry
			return $topic->save();
		} else {
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
	private function checkIfNameExists($name)
	{
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
			return new Topic($row['name'], $row['category_id'], $row['id']);
		} else {
			return null;
		}
	}

	/**
	 * Returns Topic with certain name
	 * @param $name
	 * @return null|TopicModel
	 */
	public function getByName($name){
		// Define query
		$sql = "SELECT * FROM topic WHERE name =:name";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':name' => $name));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Topic($row['name'], $row['category_id'], $row['id']);
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
				array_push($objectArray, new Topic($row['name'], $row['category_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Returns Array of all Topics of certain Category
	 * @param CategoryModel $category
	 * @return array|null
	 */
	public function getAllTopicByCategory(Category $category)
	{
		// Define query
		$sql = "SELECT * FROM topic WHERE category_id= :category_id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':category_id' => $category->getId()));
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Topic($row['name'], $row['category_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Searches for Topic
	 * @param $topic
	 * @return array|null
	 */
	public function searchForTopic($topic){
		// Define query
		$sql = "SELECT * FROM topic WHERE name LIKE :name";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':name' => '%'.$topic.'%'));
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Topic($row['name'], $row['category_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	public function getRandomTopic(){
		// Define query
		$sql = "SELECT * FROM topic ORDER BY RAND() LIMIT 1";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Topic($row['name'], $row['category_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Orders Topic Chronological
	 * @param $direction
	 * @return array|null
	 */
	public function getTopicsChronological($direction){

		$dir = "DESC";

		if($direction === "ASC" && $direction === "DESC"){
			$dir = $direction;
		}

		// Define query
		$sql = "SELECT * FROM topic ORDER BY timestamp ".$dir;

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Topic($row['name'], $row['category_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * TODO:make a popularity indicator
	 * Orders Topic By Popularity
	 * @param $direction
	 */
	public function getTopicsPopularity($direction){

	}
} 