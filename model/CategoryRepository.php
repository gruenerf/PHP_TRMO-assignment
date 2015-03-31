<?php

use CategoryModel as Category;

/**
 * Class CategoryRepository
 */
class CategoryRepository implements CategoryRepositoryInterface
{

	/**
	 * Creates a new Object
	 * @param $name
	 * @return $this
	 */
	public function create($name)
	{
		$category = new Category($name);
		return $category->save();
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
	 * Returns an Object by the idea
	 * @param $id
	 */
	public function getById($id)
	{
		// Define query
		$sql = "SELECT * FROM category WHERE id =:id";

		// Prepare database and execute Query
		$query = Database::getInstance()->prepare($sql);
		$query->execute(array(':id' => $id));
		$rows = $query->fetchAll();
		if ($rows->length() > 1){

		}
		$rows["id"];
	}

	/**
	 * Returns an array with all existing objects
	 */
	public function getAll()
	{

	}
} 