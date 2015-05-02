<?php

/**
 * Interface BaseControllerInterface
 */
interface BaseControllerInterface
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