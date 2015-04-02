<?php

use UserModel as User;

/**
 * Class UserRepository
 */
class UserRepository implements UserRepositoryInterface
{

	/**
	 * static instance
	 */
	private static $userRepository = null;


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
		if (self::$userRepository == null) {
			self::$userRepository = new UserRepository();
		}

		return self::$userRepository;
	}

	/**
	 * Creates a new Object
	 * @param $name
	 * @param $password
	 * @param $role
	 * @return null
	 *
	 * TODO: check / transform password / is role necessary
	 */
	public function create($name, $password, $role)
	{
		// Check if category already exists
		if (!$this->checkIfNameExists($name)) {
			$category = new User($name, $password, $role);
			return $category->save();
		} else {
			return null;
		}
	}

	/**
	 * Updates an existing Object
	 * @param UserModel $user
	 * @return $this
	 */
	public function update(User $user)
	{
		return $user->save();
	}

	/**
	 * Deletes an Object
	 * @param UserModel $user
	 */
	public function delete(User $user)
	{
		$user->delete();
	}

	/**
	 * Checks if Username already exists
	 * @param $name
	 * @return bool
	 */
	public function checkIfNameExists($name)
	{
		// Define query
		$sql = "SELECT * FROM user WHERE name =:name";

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
	 * @return UserModel|null
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM user WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$row = $query->fetch();

		if (!empty($row)) {
			return new User($row['name'], $row['password'], $row['role'], $row['id']);
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
		$sql = "SELECT * FROM user";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new User($row['name'], $row['password'], $row['role'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}
} 