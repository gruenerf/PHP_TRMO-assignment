<?php


class LoginController implements LoginControllerInterface{

	private $userController;

	/**
	 * Getters/Setters
	 */
	public function getUserController()
	{
		return $this->userController;
	}

	public function setUserController($userController)
	{
		$this->userController = $userController;
	}

	/**
	 * Returns if user is logged in
	 * @return bool
	 */
	public function isLoggedIn(){
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in'] === true){
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	/**
	 * Returns logged in user
	 * @return bool
	 */
	public function getLoggedInUser(){
		if(self::isLoggedIn()){
			if (isset($_SESSION['user_id'])){
				return $this->getUserController()->getById($_SESSION['user_id']);
			}
		}
		else{
			return false;
		}
	}

	/**
	 * Logs out a user
	 */
	public function logout(){
		session_destroy();
	}

	/**
	 * Constructor
	 * @param UserControllerInterface $userController
	 */
	public function __consrtuct(UserControllerInterface $userController)
	{
		$this->userController = $userController;
	}
} 