

<?php
	$parameter = $routeController->getParameter();

	foreach($parameter as $param){
		echo $param;
	}