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
	public function getSidebarLeft();

	/**
	 * @param $sidebar_left
	 * @return mixed
	 */
	public function setSidebarLeft($sidebar_left);

	/**
	 * @return mixed
	 */
	public function getSidebarRight();

	/**
	 * @param $sidebar_right
	 * @return mixed
	 */
	public function setSidebarRight($sidebar_right);
} 