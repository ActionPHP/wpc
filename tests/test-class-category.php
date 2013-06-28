<?php
require_once('simpletest/autorun.php');
require_once('../includes/class-category.php');
 
class TestWPCartCategory extends UnitTestCase 
{	
	#protected $category;

	public function __construct()
	{
		$this->category = new WPCartCategory;
	}

	public function testWPCategoryClass()
	{
		$this->assertIsA($this->category, 'WPCartCategory');
	}

	
	public function testSettersGetters()
	{	
		$category = $this->category;

		$id = 123;
		$name = 'Fantasy';
		$description = 'This will take you away to your dreamland. You will go to lands you have never seen before!';
		$image = 'https://s3.amazonaws.com/media.jetstrap.com/iBj7XIwRwaeVBso2Dl5t_rsz_img_0259.jpg';
		$tag_line = 'Where your dreams control reality.';


		$setId = $category->setId($id);
		$setName = $category->setName($name);
		$setDescription = $category->setDescription($description);
		$setImage = $category->setImage($image);
		$setTagLine = $category->setTagLine($tag_line);

		//We want all the setters to return the object so we can chain it
		$this->assertSame($setId, $category );
		$this->assertSame($setName, $category );
		$this->assertSame($setDescription, $category );
		$this->assertSame($setImage, $category );
		$this->assertSame($setTagLine, $category, 'The tag line test,' );

		$this->assertEqual($category->id, $category->getId(), 'Get id test.');
		$this->assertIsA($category->id, 'int');

		$this->assertEqual($category->name, $category->getName());
		$this->assertIsA($category->name, 'string');

		$this->assertEqual($category->image, $category->getImage());
		$this->assertIsA($category->image, 'string');

		$this->assertEqual($category->tag_line, $category->getTagLine());
		$this->assertIsA($category->tag_line, 'string');

		$this->assertEqual($category->description, $category->getDescription());
		$this->assertIsA($category->description, 'string');
	}
	
}
?>