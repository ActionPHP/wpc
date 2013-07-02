<?php
require_once(WPCART_PATH . 'includes/class-table.php');
class WPCartProductTable
{

	public function __construct()
	{
		$this->table = new WPCartTable('WPCartProduct');

	}

	public function table()
	{
		global $wpdb;
		$table_name = $this->table->getTableName();

		$sql = "

		CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,family_id INT NOT NULL 
			,category_id INT NOT NULL 
			,sku VARCHAR(250) NOT NULL 
			,name VARCHAR(255) NOT NULL 
			,brief_description VARCHAR(250) NOT NULL 
			,description TEXT NOT NULL 
			,price DECIMAL(11, 2) NOT NULL 
			,tags TEXT NOT NULL 
		)

		";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);

	}

}

?>