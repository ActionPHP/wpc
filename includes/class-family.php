<?php

require_once('class-family-table.php');
require_once('class-family-property-table.php');
require_once('class-family-property-value-table.php');
/**
* 
*/
class WPCartFamily
{
	
	public function __construct()
	{
		# code...
	}
	/**
	 * Installs the Family product prototype that extends it
	 * 
	 * @return boolean true on completion, false on failure
	 */
	public function install()
	{
		$family = $this->get();

		$family = json_decode($family);

		$familyTable = $this->getFamilyTable();
		$table->table(); //This will create the table for the WPCartFamily names to be stored.

		$familyPropertyTable = $this->getFamilyPropertyTable();
		$familyPropertyTable->table();

		$familyPropertyValueTable = $this->getFamilyPropertyValueTable();
		$familyPropertyValueTables->table();
	}

	public function getFamilyTable()
	{
		$table = new WPCartFamilyTable;
		return $table;
	}

	public function getFamilyPropertyTable()
	{
		$table = new WPCartFamilyPropertyTable;
		return $table;
	}

	public function getFamilyPropertyValueTable()
	{
		$table = new WPCartFamilyPropertyValueTable;
		return $table;
	}
}

?>