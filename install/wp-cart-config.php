<?php

	$family_array = include(WPCART_PATH . 'install/families-config.php');
	$table_array = include(WPCART_PATH . 'install/tables-config.php');
	
	$this->setFamilyArray($family_array);
	$this->setTableArray($table_array);

	
?>