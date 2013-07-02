<?php
require_once (WPCART_PATH . 'includes/class-installer.php');
/**
*  TODO
* - rewrite this whole class
* - use dependency injection
* - test all exceptions
* - create a custom exception class
*/
class WPCartActivate
{
	private $install_array;
	private $table_array;
	private $family_array;

	function __construct($var = '')
	{
		$path = WPCART_PATH . 'install/wp-cart-config.php';
		include($path);

		$this->createInstallArray();
		
	}

	public function activate()
	{
		$install_array = $this->getInstallArray();
		$installer = new WPCartInstaller($install_array);

		$installer->install();

	}

	public function createInstallArray()
	{	
		$install_array = array( 'Families' => array(), 'Tables' => array());

		$family_array = $this->getFamilyArray();
		$table_array = $this->getTableArray();

		if($this->isValidTableArray($table_array)){

			$install_array['Tables'] = $table_array;

		} else {

			throw new Exception("Invalid Table array supplied at installation.");

		}

		if($this->isValidFamilyArray($family_array)){

			$install_array['Families'] = $family_array;

		} else {

			throw new Exception("Invalid product Family prototype array supplied at installation.");
			
		}

		$this->setInstallArray($install_array);

	}

	/**
	 * Checks whether or not the supplied family_array is valid.
	 * 
	 * A valid family array must:
	 * - be an array
	 * - have family names as keys
	 * - each family must also have a properties array
	 * - each property value must be an array.
	 *
	 * @param  array  $family_array an array containing names and properties for the product Family prototypes to be installed.
	 * @return boolean               true if the family_array is a valid one, false it is invalid
	 */
	public function isValidFamilyArray($family_array)
	{


		if(!is_array($family_array)){

			return false;
		}

		//Let's make sure each family has got properties defined
		foreach($family_array as $family){

			if(!isset($family['properties']) ){

				return false;
			}

			if(!is_array($family)){

				return false;
			}

			if(!is_array($family['properties'])){

				return false;
			}

		}

		return true;

	}

	public function isValidTableArray($table_array)
	{	
			
		

		if(!is_array($table_array)){

				//throw new Exception("Table Array must be an array");
			
			return false;
		}

		foreach($table_array as $key => $table){

			//Let's make sure that the supplied class_file exists.
			
						
			if(!file_exists($table['class_file'])){
				
				//throw new Exception("The class file supplied for $key doesn't exist.");
				
				return false;
			}

			// a table name shouldn't be strictly numbers

			if(ctype_digit($table)){
			
				//throw new Exception("Table name cannot be made of numbers only.");

			return false;
			}

			//The class name cannot be empty
			if(empty($table['class'])){
			
				//throw new Exception("A valid class name must be supplied for each table.");
			
				return false;
			}

			if(ctype_digit($table['class'])){
			
				//throw new Exception("Table class name cannot be made of numbers only.");
			
				return false;
			}


		}



		return true;
	}

	public function setInstallArray($install_array)
	{
		$this->install_array = $install_array;
	}

	public function getInstallArray()
	{
		return $this->install_array;
	}


	public function setFamilyArray($family_array)
	{	
		$this->family_array = $family_array;
		
	}


	public function getFamilyArray()
	{	
		return $this->family_array;
	}

	public function setTableArray($table_array)
	{
		
		$this->table_array = $table_array;

	}
	
	public function getTableArray()
	{
	 	return $this->table_array;
	}
}

?>