<?php

interface CategoryModelInterface extends BaseModelInterface
{
	public function getName();

	public function setName($name);

	public function getUserId();

	public function setUserId($id);
} 