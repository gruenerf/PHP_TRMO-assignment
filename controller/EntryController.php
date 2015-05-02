<?php

use EntryModel as Entry;
use TopicModel as Topic;
use UserModel as User;

/**
 * Class EntryController
 */
class EntryController implements EntryControllerInterface
{
	/**
	 * Creates an object
	 * @param $title
	 * @param $content
	 * @param UserModel $user
	 * @param TopicModel $topic
	 * @return $this|null
	 */
	public function create($title, $content, User $user, Topic $topic)
	{
		return EntryRepository::getInstance()->create($title, $content, $user, $topic);
	}

	/**
	 * Updates an object
	 * @param EntryModel $entry
	 * @return $this
	 */
	public function update(Entry $entry)
	{
		return EntryRepository::getInstance()->update($entry);
	}

	/**
	 * Deletes an object
	 * @param EntryModel $entry
	 * @return mixed|void
	 */
	public function delete(Entry $entry)
	{
		EntryRepository::getInstance()->delete($entry);
	}

	/**
	 * Returns all objects of a topic
	 * @param TopicModel $topic
	 * @return array|null
	 */
	public function getAllEntryByTopic(Topic $topic)
	{
		return EntryRepository::getInstance()->getAllEntryByTopic($topic);
	}

	/**
	 * Retuerns all Entries made by a User
	 * @param UserModel $user
	 * @return array|null
	 */
	public function getAllEntryByUser(User $user)
	{
		return EntryRepository::getInstance()->getAllEntryByUser($user);
	}

	/**
	 * Searches for an entry
	 * @param $string
	 * @return array|null
	 */
	public function searchForEntry($string)
	{
		return EntryRepository::getInstance()->searchForEntry($string);
	}

	/**
	 * Returns object by id
	 * @param $id
	 * @return EntryModel|null
	 */
	public function getById($id)
	{
		return EntryRepository::getInstance()->getById($id);
	}

	/**
	 * Returns all objects
	 * @return array|null
	 */
	public function getAll()
	{
		return EntryRepository::getInstance()->getAll();
	}

	/**
	 * Returns topic by title
	 * @param $title
	 * @return EntryModel|null
	 */
	public function getByTitle($title)
	{
		return EntryRepository::getInstance()->getByTitle($title);
	}
} 