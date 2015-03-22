<?php

interface UserModelInterface
{
	public function getId();

	public function setId($id);

	public function getName();

	public function setName($name);

	public function getPassword();

	public function setPassword($password);
}