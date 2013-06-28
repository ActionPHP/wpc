<?php
class WPCartCategory
{	

	public $id;
	public $name;
	public $image;
	public $description;
	public $tag_line;

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}

	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	public function setTagLine($tag_line)
	{
		$this->tag_line = $tag_line;

		return $this;
	}

	public function getId()
	{
		return $this->id;

	}

	public function getName()
	{
		return $this->name;

	}

	public function getImage()
	{
		return $this->image;

	}

	public function getDescription()
	{
		return $this->description;

	}

	public function getTagLine()
	{
		return $this->tag_line;

	}
}
?>