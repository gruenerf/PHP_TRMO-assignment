<?php

use TopicModel as Topic;

interface TopicRepositorynterface
{
	public function create($name);

	public function update(Topic $topic);

	public function delete(Topic $topic);
} 