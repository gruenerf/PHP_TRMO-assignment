<?php

use TopicModel as Topic;
use CategoryModel as Category;
use UserModel as User;

/**
 * Interface TopicRepositoryInterface
 */
interface TopicRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param $name
	 * @param CategoryModel $category
	 * @param UserModel $user
	 * @return mixed
	 */
	public function create($name, Category $category, User $user);

	/**
	 * @param TopicModel $topic
	 * @return mixed
	 */
	public function update(Topic $topic);

	/**
	 * @param TopicModel $topic
	 * @return mixed
	 */
	public function delete(Topic $topic);

	/**
	 * @param $name
	 * @return mixed
	 */
	public function getByName($name);

	/**
	 * @param CategoryModel $category
	 * @return mixed
	 */
	public function getAllTopicByCategory(Category $category);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function getAllTopicByUser(User $user);

	/**
	 * @param $topic
	 * @return mixed
	 */
	public function searchForTopic($topic);

	/**
	 * @return mixed
	 */
	public function getRandomTopic();

	/**
	 * @param $direction
	 * @return mixed
	 */
	public function getTopicsChronological($direction);

	/**
	 * @param $direction
	 * @return mixed
	 */
	public function getTopicsPopularity($direction);
} 