<?php

/**
 * Interface LoginControllerInterface
 */
interface LoginControllerInterface
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
	 * @return mixed
	 */
	public function isLoggedIn();

	/**
	 * @return mixed
	 */
	public function getLoggedInUser();

	/**
	 * @return mixed
	 */
	public function isAdmin();

	/**
	 * @return mixed
	 */
	public function logOut();
} 