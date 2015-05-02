<?php

/**
 * Interface ErrorRepositoryInterface
 */
interface ErrorRepositoryInterface extends BaseRepositoryInterface
{
	/**
	 * @param $errormessage
	 * @return mixed
	 */
	public function create($errormessage);
}