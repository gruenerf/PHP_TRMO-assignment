<?php

abstract class UserModel implements UserModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name, $password;

	/**
	 * Getters/Setters
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * Constructor
	 * @param $name
	 * @param $password
	 */
	public function __construct($name, $password)
	{
		$this->name = $name;
		$this->password = $password;
	}

	/**
	 * Saves Object in Database
	 */
	public abstract function save();

	/**
	 * Updates Object in Database
	 */
	public abstract function update();

	/**
	 * Deletes Object in Database
	 */
	public abstract function delete();
}