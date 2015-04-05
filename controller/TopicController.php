<?php

use CategoryModel as Category;
use TopicModel as Topic;

/**
 * Class TopicController
 */
class TopicController implements TopicControllerInterface
{
	/**
	 * Creates and returns an object
	 * @param $name
	 * @param CategoryModel $category
	 * @return $this|null
	 */
	public function create($name, Category $category)
	{
		return TopicRepository::getInstance()->create($name, $category);
	}

	/**
	 * Updates an object
	 * @param TopicModel $topic
	 * @return $this
	 */
	public function update(Topic $topic)
	{
		return TopicRepository::getInstance()->update($topic);
	}

	/**
	 * Deletes an object
	 * @param TopicModel $topic
	 */
	public function delete(Topic $topic)
	{
		TopicRepository::getInstance()->delete($topic);
	}

	/**
	 * Returns all topics by category
	 * @param CategoryModel $category
	 * @return array|null
	 */
	public function getAllTopicByCategory(Category $category)
	{
		return TopicRepository::getInstance()->getAllTopicByCategory($category);
	}

	/**
	 * Search for a topic
	 * @param $topic
	 * @return array|null
	 */
	public function searchForTopic($topic)
	{
		return TopicRepository::getInstance()->searchForTopic($topic);
	}

	/**
	 * Returns a random topic
	 * @return array|null
	 */
	public function getRandomTopic()
	{
		return TopicRepository::getInstance()->getRandomTopic();
	}

	/**
	 * Returns topics sorted chronological
	 * @param $direction
	 * @return array|null
	 */
	public function getTopicsChronological($direction)
	{
		return TopicRepository::getInstance()->getTopicsChronological($direction);
	}

	/**
	 * Orders Topic By Popularity
	 * @param $direction
	 * @return array|null
	 */
	public function getTopicsPopularity($direction)
	{
		return TopicRepository::getInstance()->getTopicsPopularity($direction);
	}

	/**
	 * Returns object by id
	 * @param $id
	 * @return null|TopicModel
	 */
	public function getById($id)
	{
		return TopicRepository::getInstance()->getById($id);
	}

	/**
	 * Returns topic with specific name
	 * @param $name
	 * @return null|TopicModel
	 */
	public function getByName($name)
	{
		return TopicRepository::getInstance()->getByName($name);
	}


	/**
	 * Returns all objects
	 * @return array|null
	 */
	public function getAll()
	{
		return TopicRepository::getInstance()->getAll();
	}
} 