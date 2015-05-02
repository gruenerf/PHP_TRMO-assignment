<?php

use UserModel as User;

/**
 * Interface UserRepositoryInterface
 */
interface UserRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param $name
	 * @param $password
	 * @param $role
	 * @return mixed
	 */
	public function create($name, $password, $role);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function update(User $user);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function delete(User $user);

	/**
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	public function validateUser($username, $password);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function makeAdmin(User $user);

	/**
	 * @param UserModel $user
	 * @return mixed
	 */
	public function makeWriter(User $user);
}