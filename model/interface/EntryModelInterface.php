<?php

interface EntryModelInterface extends BaseModelInterface
{
	public function getTitle();

	public function setTitle($title);

	public function getContent();

	public function setContent($content);
}