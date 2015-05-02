<?php

use UserModel as User;

/**
 * Class UserController
 */
class UserController implements UserControllerInterface
{
	/**
	 * Creates an object
	 * @param $name
	 * @param $password
	 * @param $role
	 * @return null
	 */
	public function create($name, $password, $role)
	{
		return UserRepository::getInstance()->create($name, $password, $role);
	}

	/**
	 * Updates an object
	 * @param UserModel $user
	 * @return $this
	 */
	public function update(User $user)
	{
		return UserRepository::getInstance()->update($user);
	}

	/**
	 * Deletes an object
	 * @param UserModel $user
	 * @return mixed|void
	 */
	public function delete(User $user)
	{
		UserRepository::getInstance()->delete($user);
	}

	/**
	 * Returns object by id
	 * @param $id
	 * @return null|UserModel
	 */
	public function getById($id)
	{
		return UserRepository::getInstance()->getById($id);
	}

	/**
	 * Returns all objects
	 * @return array|null
	 */
	public function getAll()
	{
		return UserRepository::getInstance()->getAll();
	}

	/**
	 * Validates a user
	 * @param $password
	 * @param $username
	 * @return bool
	 */
	public function validateUser($password, $username)
	{
		return UserRepository::getInstance()->validateUser($password, $username);
	}

	/**
	 * Makes user admin
	 * @param UserModel $user
	 * @return bool
	 */
	public function makeAdmin(User $user)
	{
		return UserRepository::getInstance()->makeAdmin($user);
	}

	/**
	 * Makes user writer
	 * @param UserModel $user
	 * @return bool
	 */
	public function makeWriter(User $user)
	{
		return UserRepository::getInstance()->makeWriter($user);
	}
} 