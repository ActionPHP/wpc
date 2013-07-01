<?php

/**
* 
*/
class WPCartActivate
{
	
	function __construct()
	{
		# code...
	}

	public function activate()
	{
		$install_array = $this->install_array;
		$installer = WPCartInstaller($install_array);
	}

	public function createInstallArray()
	{
		$family_array = $this->getFamilyArray();

		
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

	public function isValidTableArray($tableArray)
	{
		# code...
	}
}

?>