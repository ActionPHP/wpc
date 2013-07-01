<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-family-property-value-table.php');
 
class TestWPCartFamilyPropertyValueTable extends UnitTestCase 
{	
	private $familyPropertyValueTable;
	public function	__construct()
	{

		$this->familyPropertyValueTable = new WPCartFamilyPropertyValueTable;

	}

	public function testInit()
	{
		$this->assertIsA($this->familyPropertyValueTable, 'WPCartFamilyPropertyValueTable');
	}
}
?>