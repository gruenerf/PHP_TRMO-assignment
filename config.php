<?php

include_once("constants.php");

// Start session
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

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

// Initialize the rest of the controller
$categoryController = new CategoryController();
$entryController = new EntryController();
$topicController = new TopicController();
$userController = new UserController();
$loginController = new LoginController($userController);
$validatorController = new ValidatorController($userController);