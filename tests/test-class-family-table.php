<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-family-table.php');
 
class TestWPCartFamilyTable extends UnitTestCase 
{	
	private $familyTable;
	public function	__construct()
	{

		$this->familyTable = new WPCartFamilyTable;

	}

	public function testInit()
	{
		$this->assertIsA($this->familyTable, 'WPCartFamilyTable');
	}
}
?>