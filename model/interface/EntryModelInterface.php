<?php

/**
 * Interface EntryModelInterface
 */
interface EntryModelInterface extends BaseModelInterface
{
	/**
	 * @return mixed
	 */
	public function getTitle();

	/**
	 * @param $title
	 * @return mixed
	 */
	public function setTitle($title);

	/**
	 * @return mixed
	 */
	public function getContent();

	/**
	 * @param $content
	 * @return mixed
	 */
	public function setContent($content);
}