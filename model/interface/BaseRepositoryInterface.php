<?php


/**
 * Interface BaseRepositoryInterface
 */
interface BaseRepositoryInterface
{
	/**
	 * @param $id
	 * @return mixed
	 */
	public function getById($id);

	/**
	 * @return mixed
	 */
	public function getAll();
} 