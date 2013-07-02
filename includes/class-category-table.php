<?php

class WPCartCategoryTable
{
	public $table_name;

	public function __construct()
	{
		$this->table = new WPCartTable('WPCartCategory');
	}

	public function table()
	{

		global $wpdb;

		$table_name = $this->table->getTableName();
		
		$sql = "CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,name VARCHAR(250) NOT NULL 
			,description TEXT NOT NULL 
			,image VARCHAR(1024) NOT NULL 
			,tag_line VARCHAR(250) NOT NULL 
		)";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);
	}	

}

?>