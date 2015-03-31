<?php

interface ErrorRepositoryInterface extends BaseRepositoryInterfaces
{
	public function create($errormessage);
}