<?php

/**
 * Interface UserModelInterface
 */
interface UserModelInterface extends BaseModelInterface
{
	/**
	 * @return mixed
	 */
	public function getName();

	/**
	 * @param $name
	 * @return mixed
	 */
	public function setName($name);

	/**
	 * @return mixed
	 */
	public function getPassword();

	/**
	 * @param $password
	 * @return mixed
	 */
	public function setPassword($password);

	/**
	 * @return mixed
	 */
	public function getRole();

	/**
	 * @param $role
	 * @return mixed
	 */
	public function setRole($role);
}