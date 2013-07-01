<?php
/**
 * 
 */
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . '/includes/class-activate.php');
 
class TestWPCartActivate extends UnitTestCase 
{	
	private $activate;
	public function	__construct()
	{

		$this->activate = new WPCartActivate;

	}

	public function testInit()
	{
		$this->assertIsA($this->activate, 'WPCartActivate');
	}

	public function testValidFamilyConifgurationArray()
	{
		//Ok so we're going to test the install array.
	
		$families = array(

				'GigTicket' => array(

					'properties' => array (

						'date' => array(),
						'start_time' => array(),
						'end_time' => array(),
						'band' => array(),
						'venue' => array(),
						'url' => array(),
						'age_restriction' => array(

							'G',
							'PG',
							'PG-13',
							'R',
							'NC-17'
						),
					),

				),
			);

		$valid = $this->activate->isValidFamilyArray($families);

		$this->assertNotNull($valid);
		$this->assertTrue($valid);
	}

	public function testInvalidFamilyConfigurationArray()
	{
		$families = array(

					'properties' => array (

						'date' => array(),
						'start_time' => array(),
						'end_time' => array(),
						'band' => array(),
						'venue' => array(),
						'url' => array(),
						'age_restriction' => array(

							'G',
							'PG',
							'PG-13',
							'R',
							'NC-17'
						),
					),

				);
			

		$invalid = $this->activate->isValidFamilyArray($families);

		$this->assertNotNull($invalid);
		$this->assertIdentical($invalid, false);
		
	}

	public function testIsValidTableArray()
	{
		$tables = array(

				'WPCartFamily' => array( 'class' => 'WPCartFamily'),
				'WPCartProduct' => array( 'class' => 'WPCartProduct')
			);

		$valid = $this->activate->isValidTableArray($tables);

		$this->assertIdentical($valid, true);

	}

	public function testIsInalidTableArray()
	{
		$tables =  array( 'class' => 'WPCartFamily');

		$valid = $this->activate->isValidTableArray($tables);

		$this->assertIdentical($valid, false);

	}
}
?>