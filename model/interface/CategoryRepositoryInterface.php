<?php

use CategoryModel as Category;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
	public function create($name);

	public function update(Category $category);

	public function delete(Category $category);
} 