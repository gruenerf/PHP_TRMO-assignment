<?php

/**
 * Controller Class for Routing
 *
 * Class RouteController
 */
class RouteController extends BaseController
{

	private $page_title, $view, $parameter;

	/**
	 * Getter/setter
	 */

	public function getPageTitle()
	{
		return $this->page_title;
	}

	public function setPageTitle($page_title)
	{
		$this->page_title = $page_title;
	}

	public function getView()
	{
		return $this->view;
	}

	public function setView($view)
	{
		$this->view = $view;
	}

	public function getParameter()
	{
		return $this->parameter;
	}

	public function setParameter($parameter)
	{
		$this->parameter = $parameter;
	}

	public function __construct()
	{
		$url = $this->fixString($_SERVER['REQUEST_URI']);

		$url_parts = explode("/", $url);

		// Template string
		$template = "";

		// Page title string
		$title = "The real meaning of";

		// Parameter string
		$parameter = array();

		// Possible data for routing
		$possibleRoutes = array(
			'category',
			'topic',
			'entry',
			'settings',
			'posts',
			'search',
			'login',
			'register',
			'create_topic',
			'home',
			'test'
		);

		for ($i = 2; $i < sizeof($url_parts); $i++) {
			if (!empty($url_parts[$i])) {
				// first url part is for the layout
				if ($i == 2) {
					// Check if url parameter are valid
					if (!in_array($url_parts[2], $possibleRoutes)) {
						$title .= " | 404";
						$template = "404.php";
						break;
					}
					$title .= " | " . ucfirst($url_parts[2]);
					$template .= $url_parts[2].".php";
				}

				// second part is the first parameter
				if ($i == 3) {
					$title .= " | " . $url_parts[3];
					array_push($parameter, $url_parts[3]);
				}

				// third part the second parameter and so on
				if ($i > 3) {
					$title .= " | " . $url_parts[$i];
					array_push($parameter, $url_parts[$i]);
				}
			}
			else{
				$title .= " | Home";
				$template .= "home.php";
			}
		}

		$this->setPageTitle($title);
		$this->setView($template);
		$this->setParameter($parameter);
	}
} 