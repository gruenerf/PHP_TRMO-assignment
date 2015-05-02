<?php

/**
 * Interface TopicModelInterface
 */
interface TopicModelInterface extends BaseModelInterface
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
	public function getCategoryId();

	/**
	 * @param $id
	 * @return mixed
	 */
	public function setCategoryId($id);

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