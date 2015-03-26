<?php

/**
 * Interface ErrorRepositoryInterface
 */
interface ErrorRepositoryInterface extends RepositoryInterface
{
	/**
	 * @param $errormessage
	 * @return mixed
	 */
	public function create($errormessage);
}