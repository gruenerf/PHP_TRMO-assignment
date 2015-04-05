<?php


interface ValidatorControllerInterface
{
	public function getUserController();

	public function setUserController($userController);

	public function validateString($str);

	public function validateUser($username, $password);

	public function validateTitle($title);

	public function validateContent($content);
} 