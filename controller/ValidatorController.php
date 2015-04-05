<?php


/**
 * Class ValidatorController
 */
class ValidatorController implements ValidatorControllerInterface
{
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
	 * Validates a String for registration
	 * @param $str
	 * @return bool
	 */
	function validateString($str)
	{
		return preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $str) && (strlen($str) < 21 && strlen($str) > 5);
	}

	/**
	 * Validates a user
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	function validateUser($username, $password)
	{
		return $this->getUserController()->validateUser($username, $password);
	}


	/**
	 * Constructor
	 * @param UserControllerInterface $userController
	 */
	public function __construct(UserControllerInterface $userController)
	{
		$this->userController = $userController;
	}
}