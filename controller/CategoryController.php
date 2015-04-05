<?php

use CategoryModel as Category;
use UserModel as User;

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
	public function create($name, User $user)
	{
		return CategoryRepository::getInstance()->create($name, $user);
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

	/**
	 * Returns all categories of a certain user
	 * @param UserModel $user
	 * @return mixed
	 */
	public function getAllCategoryByUser(User $user){
		return CategoryRepository::getInstance()->getAllCategoryByUser($user);
	}
} 