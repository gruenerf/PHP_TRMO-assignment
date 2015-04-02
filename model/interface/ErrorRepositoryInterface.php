<?php

interface ErrorRepositoryInterface extends BaseRepositoryInterface
{
	public function create($errormessage);
}