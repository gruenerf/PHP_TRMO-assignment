<?php

use EntryModel as Entry;
use TopicModel as Topic;
use UserModel as User;

/**
 * Interface EntryRepositoryInterface
 */
interface EntryRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param $title
	 * @param $content
	 * @param UserModel $user
	 * @param TopicModel $topic
	 * @return mixed
	 */
	public function create($title, $content, User $user, Topic $topic);

	/**
	 * @param EntryModel $entry
	 * @return mixed
	 */
	public function update(Entry $entry);

	/**
	 * @param EntryModel $entry
	 * @return mixed
	 */
	public function delete(Entry $entry);

	/**
	 * @param TopicModel $topic
	 * @return mixed
	 */
	public function getAllEntryByTopic(Topic $topic);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function getAllEntryByUser(User $user);

	/**
	 * @param $string
	 * @return mixed
	 */
	public function searchForEntry($string);

	/**
	 * @param $title
	 * @return mixed
	 */
	public function getByTitle($title);
}