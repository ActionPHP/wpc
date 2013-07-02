<?php
require_once(WPCART_PATH . 'includes/class-table.php');

/**
* 
*/
class WPCartPropertyValueTable
{
	
	function __construct()
	{
		$this->table = new WPCartTable('WPCartPropertyValue');
	}

	public function table()
	{
		
		$table_name = $this->table->getTableName();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,property_id INT NOT NULL 
			,name TEXT NOT NULL
			,Status VARCHAR(10) DEFAULT 'fresh' NOT NULL
		)";
	
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);

	
	}

	public function create($value)
	{
		$name = $value->name;
		$property_id = $value->property_id;
		$table = $this->table;
		$value->id = $this->table->create($name);
		$this->table->update($value->id, $property_id, 'property_id');
update_option('a32', get_defined_vars());
		return $value->id;
	}
}

?>