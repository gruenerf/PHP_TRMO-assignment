<?php

use EntryModel as Entry;
use TopicModel as Topic;
use UserModel as User;

interface EntryRepositoryInterface extends BaseRepositoryInterfaces
{
	public function create($title, $content, User $user, Topic $topic);

	public function update(Entry $entry);

	public function delete(Entry $entry);

	public function getAllEntryByTopic(Topic $topic);

	public function getAllEntryByUser(User $user);
}