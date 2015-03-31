<?php

use UserModel as User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
	public function create($name, $password, $role);

	public function update(User $user);

	public function delete(User $user);
} 