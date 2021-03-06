<?php

use EntryModel as Entry;
use TopicModel as Topic;
use UserModel as User;

class EntryRepository implements EntryRepositoryInterface
{
	/**
	 * static instance
	 */
	private static $entryRepository = null;

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
		if (self::$entryRepository == null) {
			self::$entryRepository = new EntryRepository();
		}

		return self::$entryRepository;
	}

	/**
	 * Creates a new Object and the reference to Topic
	 * @param $title
	 * @param $content
	 * @param UserModel $user
	 * @param TopicModel $topic
	 * @return $this|null
	 */
	public function create($title, $content, User $user, Topic $topic)
	{
		// Check if Entry already exists
		if (!$this->checkIfTitleExists($title)) {
			$entry = new Entry($title, $content, $user->getId(), $topic->getId());

			// Return saved entry
			return $entry->save();
		} else {
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
	 * @return mixed|void
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
	private function checkIfTitleExists($title)
	{
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
			return new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']);
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
				array_push($objectArray, new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Returns Array of all Entries of certain Topic
	 * @param TopicModel $topic
	 * @return array|null
	 */
	public function getAllEntryByTopic(Topic $topic)
	{
		// Define query
		$sql = "SELECT * FROM entry WHERE topic_id= :topic_id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':topic_id' => $topic->getId()));
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Returns Array of all Entries of certain Topic
	 * @param UserModel $user
	 * @return array|null
	 */
	public function getAllEntryByUser(User $user)
	{
		// Define query
		$sql = "SELECT * FROM entry WHERE user_id= :user_id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':user_id' => $user->getId()));
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Searches for Entry
	 * @param $string
	 * @return array|null
	 */
	public function searchForEntry($string)
	{
		// Define query
		$sql = "SELECT * FROM entry WHERE MATCH (title, content) AGAINST (:string IN BOOLEAN MODE)";

		// Explode the searchstring for single words
		$string = str_replace('%20', ' ', $string);
		$stringParts = explode(' ', $string);
		$stringBuffer = '';

		// Make search string which has to include all searchwords
		foreach ($stringParts as $part) {
			if ($part !== " " && $part !== null && $part !== "") {
				$stringBuffer .= '+' . $part . ' ';
			}
		}

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':string' => $stringBuffer));

		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}

	/**
	 * Counts entries in of a certain topic within the last month
	 * @param TopicModel $topic
	 * @return int
	 */
	public function countEntriesByTopicLastMonth(Topic $topic)
	{
		// Define query
		$sql = "SELECT COUNT('title') FROM entry WHERE topic_id= :topic_id AND timestamp BETWEEN (NOW() - INTERVAL 1 MONTH) AND NOW();";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':topic_id' => $topic->getId()));
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			foreach ($rows as $row) {
				return $row["COUNT('title')"];
			}
		} else {
			return 0;
		}
	}

	/**
	 * Returns Entry with certain title
	 * @param $title
	 * @return EntryModel|null
	 */
	public function getByTitle($title)
	{
		// Define query
		$sql = "SELECT * FROM entry WHERE title =:title";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':title' => $title));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Entry($row['title'], $row['content'], $row['user_id'], $row['topic_id'], $row['id']);
		} else {
			return null;
		}
	}
} 