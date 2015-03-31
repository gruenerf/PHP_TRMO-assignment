<?php

use TopicModel as Topic;

interface TopicRepositorynterface extends BaseRepositoryInterfaces
{
	public function create($name);

	public function update(Topic $topic);

	public function delete(Topic $topic);
} 