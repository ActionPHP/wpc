<?php
/**
* Installs 
* 
* - Tables
* - Product Family prototypes
*/
class WPCartInstaller
{
	private $install_array;

	function __construct($install_array = array())
	{
		$this->setInstallArray($install_array);
	}

	public function install()
	{
		
		//Let's create the tables
		$this->installTables();
		
		//$tablesInstalled = $this->installTables();

		//Let's install the product Family prototypes
		$this->installFamilies();
	}
	

	public function installTables()
	{
		$this->tables = $install_array['Tables'];

		$family = new WPCartFamily;
		$family->table();

		return true;
	}

	public function installTable($table)
	{
		# code...
	}

	public function installFamilies()
	{
		$familyTable = $this->getFamilyTable();

		$families = $this->getFamilyArray();

		foreach ($families as $families => $value) {
			
			$this->installFamily($name, $properties);
		}
	}

	public function installFamily($name, $properties)
	{
		$familyTable = $this->getFamilyTable();
		$families = $this->getFamilyArray();

		foreach ($families as $family => $property) {
			
			pre('Family name: '. $family);
			pre($property);

		}

		return;
	}

	public function setFamilyArray()
	{
		$install_array = $this->getInstallArray();
		$this->familyArray = $install_array['Families'];
	}

	public function getFamilyArray()
	{
		return $this->familyArray;
	}

	public function setInstallArray($install_array)
	{
		$this->install_array = $install_array;
	}

	public function getInstallArray()
	{
		if(!$this->install_array){

			$this->install_array = $install_array;

		}

		return $this->install_array;
	}	

	
}

?>