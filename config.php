<?php

// Define Root Path
define('ROOT_PATH', realpath(__DIR__));
define('IMG_PATH', ROOT_PATH . '/assets/img/');
define('CSS_PATH', ROOT_PATH . '/assets/css/');
define('JS_PATH', ROOT_PATH . '/assets/js/');
define('FONTS_PATH', ROOT_PATH . '/assets/fonts/');

// Autoloader function
function autoload($interface)
{
	$filename = $interface . '.php';
	$file = ROOT_PATH . '/model/interface/' . $filename;

	if (!file_exists($file)) {
		$file = ROOT_PATH . '/model/' . $filename;

		if (!file_exists($file)) {
			$file = ROOT_PATH . '/controller/interface/' . $filename;

			if (!file_exists($file)) {
				$file = ROOT_PATH . '/controller/' . $filename;

				if (!file_exists($file)) {
					return false;
				}
			}
		}
	}
	include $file;
}

// Register autoload functions
spl_autoload_register('autoload');

// Initialize routing
$routeController = new RouteController();