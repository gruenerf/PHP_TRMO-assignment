<?php

use CategoryModel as Category;
use UserModel as User;

/**
 * Interface CategoryRepositoryInterface
 */
interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param $name
	 * @param UserModel $user
	 * @return mixed
	 */
	public function create($name, User $user);

	/**
	 * @param CategoryModel $category
	 * @return mixed
	 */
	public function update(Category $category);

	/**
	 * @param CategoryModel $category
	 * @return mixed
	 */
	public function delete(Category $category);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function getAllCategoryByUser(User $user);
} 