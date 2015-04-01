<?php

// Define Root Path
define('ROOT_PATH', realpath(__DIR__));

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