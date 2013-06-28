<?php
class WPCartProduct
{
	protected $id;
	protected $category_id;
	protected $name;
	protected $brief_description;
	protected $description;
	protected $tags;
	protected $properties;

	public function create($data)
	{
		# code...
		$id = 1; //This will be replaced by id returned from db

		$this->setId($id);

		$data->id = $this->getId();
		return $data;
	}

	public function get($id)
	{
		# code...
	}

	public function update($data)
	{
		# code...
	}

	public function remove($id)
	{
		# code...
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name ;
	}

	public function setCategoryId($category_id)
	{
		$this->category_id = $category_id ;
	}

	public function setBriefDescription($brief_description)
	{
		$this->brief_description = $brief_description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setTags()
	{
		$this->tags = $tags;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		# code...
	}

	public function getCategoryId()
	{
		# code...
	}

	public function getBriefDescription()
	{
		# code...
	}

	public function getDescription()
	{
		# code...
	}

	public function getTags()
	{
		# code...
	}
}
?>