<?php

class BaseController{

	/**
	 * To santisize User import
	 * @param $string
	 * @return string
	 */
	public function fixString($string){
		$str = mysql_real_escape_string($string);
		$str = htmlentities($str);
		return $str;
	}
} 