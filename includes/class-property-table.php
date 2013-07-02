<?php
require_once(WPCART_PATH . 'includes/class-table.php');
/**
* 
*/
class WPCartPropertyTable	
{
	
	public function __construct()
	{
		$this->table = new WPCartTable('WPCartProperty');
		
	}

	public function table()
	{
		$table_name = $this->table->getTableName();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,family_id INT NOT NULL 
			,name VARCHAR(250) NOT NULL
			,Status VARCHAR(10) DEFAULT 'fresh' NOT NULL
		)";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);

	
	}

	public function create($property)
	{
		$property->id = $this->table->create($property->name);

		$family_id = $property->family_id;
		$this->table->update($property->id, $family_id, 'family_id');

		//Let's enter the property values into the database
		$values = $property->values;

		foreach($values as $value){
			if($value) 	$_values[] = $value;

			$value_object = new stdClass();
			$value_object->property_id = $property->id;
			$value_object->name = $value;

			$this->createPropertyValue($value_object);
		}
		
	}

	public function createPropertyValue($value)
	{
		$propertyValueTable = $this->getPropertyValueTable();
		$propertyValueId = $propertyValueTable->create($value);

		return $propertyValueId;
	}

	public function getPropertyValueTable()
	{
		$this->propertyValueTable = new WPCartPropertyValueTable;
		return $this->propertyValueTable;
	}
}

?>