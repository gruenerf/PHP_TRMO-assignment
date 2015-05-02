<?php

/**
 * Interface CategoryModelInterface
 */
interface CategoryModelInterface extends BaseModelInterface
{
	/**
	 * @return mixed
	 */
	public function getName();

	/**
	 * @param $name
	 * @return mixed
	 */
	public function setName($name);

	/**
	 * @return mixed
	 */
	public function getUserId();

	/**
	 * @param $id
	 * @return mixed
	 */
	public function setUserId($id);
} 