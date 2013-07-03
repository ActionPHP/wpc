<?php
require_once(WPCART_PATH . 'includes/class-table.php');
/**
* 
*/
class WPCartFamilyTable
{
	public $table_name;

	public function __construct()
	{

		$this->table = new WPCartTable('WPCartFamily');
	}
	/**
	 * Creates the WPCartProductFamily table.
	 * 	
	 */
	public function table()
	{
		global $wpdb;

		$table_name = $this->table->getTableName();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name
		(
			id INT NOT NULL AUTO_INCREMENT
			,PRIMARY KEY (id)
			,name VARCHAR(250) NOT NULL
			,Status VARCHAR(10) DEFAULT 'fresh' NOT NULL
		)";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
		dbDelta($sql);
	
	}
	/**
	 * Creates a new entry of a product Family prototype.
	 * 
	 * @param  WPCartFamilyFamilyName $family instance of the Family to be created
	 * @return int         the id of the created family
	 */
	public function create($family)
	{
		$family_id = $this->table->create($family->name);
		return $family_id;
	}

	public function get($id='')
	{
		$family = $this->table->get($id);

		return $family;

	}

}

?>