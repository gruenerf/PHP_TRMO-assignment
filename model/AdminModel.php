<?php

class AdminModel extends UserModel
{
	/**
	 * Private Variables
	 */
	private $role;

	/**
	 * Getters/Setters
	 */
	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	/**
	 * Constructor
	 * @param $name
	 * @param $password
	 */
	public function __construct($name, $password)
	{
		parent::__construct($name, $password);
		$this->role = "Admin";
	}
} 