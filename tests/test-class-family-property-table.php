<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-family-property-table.php');
 
class TestWPCartFamilyPropertyTable extends UnitTestCase 
{	
	private $familyPropertyTable;
	public function	__construct()
	{

		$this->familyPropertyTable = new WPCartFamilyPropertyTable;

	}

	public function testInit()
	{
		$this->assertIsA($this->familyPropertyTable, 'WPCartFamilyPropertyTable');
	}
}
?>