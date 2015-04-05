<?php

interface TopicModelInterface extends BaseModelInterface
{
	public function getName();

	public function setName($name);

	public function getCategoryId();

	public function setCategoryId($id);

	public function getUserId();

	public function setUserId($id);

}