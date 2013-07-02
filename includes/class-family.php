<?php

require_once('class-family-table.php');
require_once('class-property-table.php');
require_once('class-property-value-table.php');
/**
* 
*/
class WPCartFamily
{
	private $family;
	private $family_properties;
	private $familyTable;
	private $propertyTable;
	private $propertyValueTable;

	public function __construct()
	{
		$this->familyTable = $this->getFamilyTable();
		$this->propertyTable = $this->getPropertyTable();
		
	}
	
	public function createFamily()
	{
		$family = $this->family;
		$name = $family->name;
		
		$this->setFamilyProperties($family->properties);
		

		$familyTable = $this->getFamilyTable();

		//Let's create an entry for the family in our table
		$family_id = $familyTable->create($family);
		$this->setFamilyId($family_id);

		$this->createProperties();
			
		
	}

	public function createProperties()
	{
		$properties = $this->getFamilyProperties();
		$family_id = $this->getFamilyId();

		foreach($properties as $property => $values){

			$property_object = new stdClass();
			
			$property_object->name = $property;
			$property_object->values = $values;
			$property_object->family_id = $family_id;
			
			$createdProperties[] = $this->createProperty($property_object);

		}

		return $createdProperties;
	}

	public function createProperty($property_object)
	{
		$propertyTable = $this->getPropertyTable();
				
		$family_id = $this->getFamilyId();

		$property_id = $propertyTable->create($property_object);
		

	}


	public function setFamily($family)
	{
		$this->family = $family;
	}

	public function getFamily()
	{
		return $this->family;
	}

	public function setFamilyId($family_id)
	{
		$this->family->id = $family_id;
	}

	public function getFamilyId()
	{
		return $this->family->id;
	}

	public function setFamilyProperties($family_properties)
	{
		$this->family->properties = $family_properties;
	}

	public function getFamilyProperties()
	{
		return $this->family->properties;
	}
	
	public function getFamilyTable()
	{
		$this->familyTable = new WPCartFamilyTable;
		return $this->familyTable;
	}

	public function getPropertyTable()
	{
		$this->propertyTable = new WPCartPropertyTable;
		return $this->propertyTable;
	}

	
}

?>