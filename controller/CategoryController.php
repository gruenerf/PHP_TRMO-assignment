<?php

use CategoryModel as Category;

/**
 * Class CategoryController
 */
class CategoryController implements CategoryControllerInterface
{

	/**
	 * Creates and returns an object
	 * @param $name
	 * @return $this
	 */
	public function create($name)
	{
		return CategoryRepository::getInstance()->create($name);
	}

	/**
	 * Updates an object
	 * @param CategoryModel $category
	 * @return $this
	 */
	public function update(Category $category)
	{
		return CategoryRepository::getInstance()->update($category);
	}

	/**
	 * Deletes an object
	 * @param CategoryModel $category
	 */
	public function delete(Category $category)
	{
		CategoryRepository::getInstance()->delete($category);
	}

	/**
	 * Returns an object with a certain id
	 * @param $id
	 * @return CategoryModel|null
	 */
	public function getById($id)
	{
		return CategoryRepository::getInstance()->getById($id);
	}

	/**
	 * Returns all objects
	 * @return array|null
	 */
	public function getAll()
	{
		return CategoryRepository::getInstance()->getAll();
	}
} 