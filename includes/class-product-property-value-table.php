<?php

/**
* 
*/
class WPCartProductPropertyValueTable
{	
	public $table_name;

	public function __construct()
	{
		$this->table = new WPCartTable('WPCartProductPropertyValue');
	}

	public function table()
	{

		global $wpdb;

		$table_name = $this->table->getTableName();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,property_value_id INT NOT NULL 
			,product_id INT NOT NULL 
			,affects_price BIT NOT NULL 
			,price_difference DECIMAL(11,2) NOT NULL 
		)";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);
	}
}
?>