<?php

use CategoryModel as Category;

/**
 * Class CategoryRepository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
	/**
	 * static instance
	 */
	private static $categoryRepository = null;

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
		if (self::$categoryRepository == null) {
			self::$categoryRepository = new CategoryRepository();
		}

		return self::$categoryRepository;
	}

	/**
	 * Creates a new Object
	 * @param $name
	 * @return $this
	 */
	public function create($name)
	{
		// Check if category already exists
		if(!$this->checkIfNameExists($name)){
			$category = new Category($name);
			return $category->save();
		}
		else{
			return null;
		}
	}

	/**
	 * Updates an existing Object
	 * @param CategoryModel $category
	 * @return $this
	 */
	public function update(Category $category)
	{
		return $category->save();
	}

	/**
	 * Deletes an Object
	 * @param CategoryModel $category
	 */
	public function delete(Category $category)
	{
		$category->delete();
	}

	/**
	 * Checks if Category already exists
	 * @param $name
	 * @return bool
	 */
	private function checkIfNameExists($name){
		// Define query
		$sql = "SELECT * FROM category WHERE name =:name";

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
	 * @return CategoryModel|null
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM category WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$row = $query->fetch();

		if (!empty($row)) {
			return new Category($row['name'], $row['id']);
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
		$sql = "SELECT * FROM category";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();

		if (!empty($rows)) {
			$objectArray = array();

			foreach ($rows as $row) {
				array_push($objectArray, new Category($row['name'], $row['id']));
			}

			return $objectArray;
		} else {
			return null;
		}
	}
} 