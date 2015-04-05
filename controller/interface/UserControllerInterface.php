<?php

use UserModel as User;

interface UserControllerInterface extends BaseControllerInterface
{
	public function create($name, $password, $role);

	public function update(User $user);

	public function delete(User $user);

	public function validateUser($password, $username);
} 