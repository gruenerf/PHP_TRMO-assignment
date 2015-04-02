<?php

use TopicModel as Topic;
use CategoryModel as Category;

interface TopicRepositorynterface extends BaseRepositoryInterfaces
{
	public function create($name, Category $category);

	public function update(Topic $topic);

	public function delete(Topic $topic);

	public function getAllTopicByCategory(Category $category);
} 