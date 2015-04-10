<?php


/**
 * Interface RouteControllerInterface
 */
interface RouteControllerInterface
{
	/**
	 * @return mixed
	 */
	public function getPageTitle();

	/**
	 * @param $title
	 * @return mixed
	 */
	public function setPageTitle($title);

	/**
	 * @return mixed
	 */
	public function getView();

	/**
	 * @param $view
	 * @return mixed
	 */
	public function setView($view);

	/**
	 * @return mixed
	 */
	public function getParameter();

	/**
	 * @param $parameter
	 * @return mixed
	 */
	public function setParameter($parameter);

	/**
	 * @return mixed
	 */
	public function isSettings();
} 