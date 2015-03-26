<?php

use UserModel as User;

interface UserRepositoryInterface
{
	public function create($name, $password);

	public function update(User $user);

	public function delete(User $user);
} 