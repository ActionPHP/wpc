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
		$tablesInstalled = $this->installTables();
		
		//Let's install the product Family prototypes
		$familiesInstalled = $this->installFamilies();

		update_option('a1', get_defined_vars());
	}
	

	public function installTables()
	{
		$tables = $this->getTablesArray();
		$tables_installed = array();
		
		foreach($tables as $table => $data){

			$table_object = new stdClass();

			$table_object->name = $table;
			$table_object->class = $data['class'];
			$table_object->class_file = $data['class_file'];

			

			$tables_installed[] = $table_object->name;

			$this->installTable($table_object);

		}
		
		return $tables_installed;
	}

	public function installTable($table_object)
	{
		$table = $table_object;

		require_once($table->class_file);
		$table_class = new $table->class($table_name);

		$table_class->table();


	}

	public function installFamilies()
	{
		$families = $this->getFamilyArray();

		foreach ($families as $family => $data) {
			
			$family_object = new stdClass();

			$family_object->name = $family;
			$family_object->properties = $data['properties'];

			$installed = $this->installFamily($family_object);
			
			$families_installed[] = $installed;

		}
				

		return $families_installed;
	}

	public function installFamily($family_object)
	{
		$family = new WPCartFamily;

		$family->setFamily($family_object);
		$family->createFamily();

		return $family_object->name;
		
	}

	public function setFamilyArray($family_array)
	{
		$this->family_array = $family_array;
	}

	public function getFamilyArray()
	{
		$install_array = $this->getInstallArray();
		$this->family_array = $install_array['Families'];
		return $this->family_array;
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

	public function getTablesArray()
	{
		$install_array = $this->getInstallArray();
		$this->tables_array = $install_array['Tables'];
		return $this->tables_array;
	}
}

?>