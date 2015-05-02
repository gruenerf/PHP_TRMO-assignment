<?php

/**
 * Controller Class for Routing
 *
 * Class RouteController
 */
class RouteController extends BaseController implements RouteControllerInterface
{

	private $page_title, $view, $parameter, $sidebar_left, $sidebar_right;

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

	public function getSidebarLeft()
	{
		return $this->sidebar_left;
	}

	public function setSidebarLeft($sidebar_left)
	{
		$this->sidebar_left = $sidebar_left;
	}

	public function getSidebarRight()
	{
		return $this->sidebar_right;
	}

	public function setSidebarRight($sidebar_right)
	{
		$this->sidebar_right = $sidebar_right;
	}

	public function __construct()
	{
		$url = $this->fixString($_SERVER['REQUEST_URI']);

		$url_parts = explode("/", $url);

		// Template string
		$template = "";
		$template_left = "";
		$template_right = "";

		// Page title string
		$title = "The real meaning of";

		// Parameter string
		$parameter = array();

		// Possible data for routing
		$possibleRoutes = array(
			'category',
			'categories',
			'topic',
			'topics',
			'entry',
			'entries',
			'settings',
			'search',
			'summary',
			'login',
			'register',
			'home',
			'users'
		);

		$sideTemplate_left = array(
			'category' => 'category',
			'search' => 'category',
			'login' => 'category',
			'register' => 'category',
			'home' => 'category',
			'topic' => 'topic',
			'entry' => 'entry',
			'settings' => 'user',
			'summary' => 'user',
			'entries' => 'user',
			'topics' => 'user',
			'categories' => 'user',
			'users' => 'user'
		);

		$sideTemplate_right = array(
			'category' => 'topic',
			'search' => 'topic',
			'login' => 'topic',
			'register' => 'topic',
			'home' => 'topic',
			'topic' => 'topic',
			'entry' => 'topic',
			'settings' => 'logout',
			'summary' => 'logout',
			'entries' => 'logout',
			'topics' => 'logout',
			'categories' => 'logout',
			'users' => 'logout'
		);


		for ($i = 2; $i < sizeof($url_parts); $i++) {
			if (!empty($url_parts[$i])) {
				// first url part is for the layout
				if ($i == 2) {
					// Check if url parameter are valid
					if (!in_array($url_parts[2], $possibleRoutes)) {
						$title .= " | 404";
						$template = "404.php";
						$template_left = 'sidebar_left_' . $sideTemplate_left['category'] . ".php";
						$template_right = 'sidebar_right_' . $sideTemplate_right['category'] . ".php";
						break;
					}
					$title .= " | " . ucfirst($url_parts[2]);
					$template .= $url_parts[2] . ".php";
					$template_left = 'sidebar_left_' . $sideTemplate_left[$url_parts[2]] . ".php";
					$template_right = 'sidebar_right_' . $sideTemplate_right[$url_parts[2]] . ".php";

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
			} else {
				if($i < 3){
					$title .= " | Home";
					$template = "home.php";
					$template_left = 'sidebar_left_' . $sideTemplate_left['home'] . ".php";
					$template_right = 'sidebar_right_' . $sideTemplate_right['home'] . ".php";
				}
			}
		}

		$this->setPageTitle($title);
		$this->setView($template);
		$this->setSidebarLeft($template_left);
		$this->setSidebarRight($template_right);
		$this->setParameter($parameter);
	}
}