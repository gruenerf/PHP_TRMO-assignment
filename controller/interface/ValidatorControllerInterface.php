<?php

/**
 * Interface ValidatorControllerInterface
 */
interface ValidatorControllerInterface
{
	/**
	 * @return mixed
	 */
	public function getUserController();

	/**
	 * @param $userController
	 * @return mixed
	 */
	public function setUserController($userController);

	/**
	 * @param $str
	 * @return mixed
	 */
	public function validateString($str);

	/**
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	public function validateUser($username, $password);

	/**
	 * @param $title
	 * @return mixed
	 */
	public function validateTitle($title);

	/**
	 * @param $content
	 * @return mixed
	 */
	public function validateContent($content);
} 