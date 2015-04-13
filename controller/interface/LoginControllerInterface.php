<?php


interface LoginControllerInterface
{
	public function getUserController();

	public function setUserController($userController);

	public function isLoggedIn();

	public function getLoggedInUser();

	public function isAdmin();

	public function logOut();
} 