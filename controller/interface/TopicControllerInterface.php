<?php

use TopicModel as Topic;
use CategoryModel as Category;

interface TopicControllerInterface extends BaseControllerInterface{
	public function create($name, Category $category);

	public function update(Topic $topic);

	public function delete(Topic $topic);

	public function getAllTopicByCategory(Category $category);

	public function searchForTopic($topic);

	public function getRandomTopic();

	public function getTopicsChronological($direction);

	public function getTopicsPopularity($direction);
} 