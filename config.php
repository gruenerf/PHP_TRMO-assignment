<?php

// Define Root Path
define('ROOT_PATH', realpath(__DIR__));

// Autoloader function
function autoload($interface)
{
	$filename = $interface . '.php';
	$file = ROOT_PATH . '/model/interface/' . $filename;

	if (!file_exists($file)) {
		echo "1";
		$file = ROOT_PATH . '/model/' . $filename;

		if (!file_exists($file)) {
			echo "2";
			$file = ROOT_PATH . '/controller/interface/' . $filename;

			if (!file_exists($file)) {
				echo "3";
				$file = ROOT_PATH . '/controller/' . $filename;

				if (!file_exists($file)) {
					echo "false  " . $file;
					return false;
				}
			}
		}
	}

	echo $file;
	include $file;
}

// Register autoload functions
spl_autoload_register('autoload');