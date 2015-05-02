<?php


/**
 * Class ValidatorController
 */
class ValidatorController implements ValidatorControllerInterface
{
	/**
	 * @var UserControllerInterface
	 */
	private $userController;

	/**
	 * Getters/Setters
	 */
	public function getUserController()
	{
		return $this->userController;
	}

	/**
	 * @param $userController
	 * @return mixed|void
	 */
	public function setUserController($userController)
	{
		$this->userController = $userController;
	}

	/**
	 * Constructor
	 * @param UserControllerInterface $userController
	 */
	public function __construct(UserControllerInterface $userController)
	{
		$this->userController = $userController;
	}

	/**
	 * Validates a String for registration
	 * @param $str
	 * @return bool
	 */
	public function validateString($str)
	{
		return preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $str) && (strlen($str) < 21 && strlen($str) > 5);
	}

	/**
	 * Validates a user
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	public function validateUser($username, $password)
	{
		return $this->getUserController()->validateUser($username, $password);
	}

	/**
	 * Validates a Entry Title
	 * @param $title
	 * @return bool
	 */
	public function validateTitle($title){
		return strlen($title) <= 40;
	}

	/**
	 * Validates the Content
	 * @param $content
	 * @return bool
	 */
	public function validateContent($content){
		return strlen($content) <= 1000;
	}
}