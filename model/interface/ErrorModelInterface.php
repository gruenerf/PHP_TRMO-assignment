<?php

/**
 * Interface ErrorModelInterface
 */
interface ErrorModelInterface extends BaseModelInterface
{
	/**
	 * @return mixed
	 */
	public function getErrormessage();

	/**
	 * @param $errormassage
	 * @return mixed
	 */
	public function setErrormessage($errormassage);
}