<?php

/**
 * Interface BaseModelInterface
 */
interface BaseModelInterface
{
	/**
	 * @return mixed
	 */
	public function getId();

	/**
	 * @param $id
	 * @return mixed
	 */
	public function setId($id);

	/**
	 * @return mixed
	 */
	public function save();

	/**
	 * @return mixed
	 */
	public function delete();
} 