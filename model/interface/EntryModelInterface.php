<?php

interface EntryModelInterface {
	public function getId();
	public function setId($id);
	public function getTitle();
	public function setTitle($title);
	public function getContent();
	public function setContent($content);
}