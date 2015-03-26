<?php

interface BaseModelInterface
{
	public function getId();

	public function setId($id);

	public function save();

	public function update();

	public function delete();
} 