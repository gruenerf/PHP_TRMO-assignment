<?php

//TODO interface

class BaseModel{

	/**
	 * To santisize User import
	 * @param $string
	 * @return string
	 */
	function fix_string($string){
		$str = mysql_real_escape_string($string);
		$str = htmlentities($str);
		return $str;
	}

} 