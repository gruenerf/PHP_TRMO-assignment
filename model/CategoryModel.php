<?php


class CategoryModel implements CategoryModelInterface
{
	/**
	 * Private Variables
	 */
	private $id, $name;

	/**
	 * Getters / Setters
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Constructor
	 * @param $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * Saves Object in Database
	 */
	public function save()
	{
	}

	/**
	 * Updates Object in Database
	 */
	public function update()
	{
	}

	/**
	 * Deletes Object in Database
	 */
	public function delete()
	{
	}
} 