<?php

interface WriterModelInterface extends UserModelInterface
{
	public function getRole();

	public function setRole($role);
} 