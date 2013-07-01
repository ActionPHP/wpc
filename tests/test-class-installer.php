<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . '/includes/class-installer.php');
 
class TestWPCartInstaller extends UnitTestCase 
{	
	private $installer;
	public function	__construct()
	{	
		$this->installer = new WPCartInstaller;

	}

	public function testInit()
	{
		$installer = $this->installer;

		$this->assertIsA($installer, 'WPCartInstaller');
	}



	public function testInstallFamilies()
	{
		
	}
}
?>