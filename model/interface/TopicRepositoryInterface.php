<?php

use TopicModel as Topic;
use CategoryModel as Category;
use UserModel as User;

interface TopicRepositoryInterface extends BaseRepositoryInterface
{
	public function create($name, Category $category, User $user);

	public function update(Topic $topic);

	public function delete(Topic $topic);

	public function getByName($name);

	public function getAllTopicByCategory(Category $category);

	public function getAllTopicByUser(User $user);

	public function searchForTopic($topic);

	public function getRandomTopic();

	public function getTopicsChronological($direction);

	public function getTopicsPopularity($direction);
} 