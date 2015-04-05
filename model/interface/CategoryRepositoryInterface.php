<?php

use CategoryModel as Category;
use UserModel as User;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
	public function create($name, User $user);

	public function update(Category $category);

	public function delete(Category $category);

	public function getAllCategoryByUser(User $user);
} 