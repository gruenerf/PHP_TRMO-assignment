<?php

use CategoryModel as Category;

interface CategoryControllerInterface extends BaseControllerInterface
{
	public function create($name);

	public function update(Category $category);

	public function delete(Category $category);
} 