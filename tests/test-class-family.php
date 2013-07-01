<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-family.php');
 
class TestWPCartFamily extends UnitTestCase 
{	
	private $family;
	public function	__construct()
	{

		$this->family = new WPCartFamily;

	}

	public function testInit()
	{
		$this->assertIsA($this->family, 'WPCartFamily');
	}

	public function testGetFamilyTable()
	{	
		$familyTable = $this->family->getFamilyTable();
		$this->assertIsA($familyTable, 'WPCartFamilyTable');
	}

	public function testGetFamilyPropertyTable()
	{	
		$familyPropertyTable = $this->family->getFamilyPropertyTable();
		$this->assertIsA($familyPropertyTable, 'WPCartFamilyPropertyTable');
	}

	public function testGetFamilyPropertyValueTable()
	{	
		$familyPropertyValueTable = $this->family->getFamilyPropertyValueTable();
		$this->assertIsA($familyPropertyValueTable, 'WPCartFamilyPropertyValueTable');
	}
}
?>