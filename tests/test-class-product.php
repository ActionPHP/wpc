<?php

require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-product.php');
/**
 * 
 */
class TestWPCartProduct extends UnitTestCase 
{	
	public function __construct()
	{
			$this->product = new WPCartProduct;
	}
	public function testInit()
	{
		$this->assertIsA($this->product, 'WPCartProduct');
	}

	public function testSettersGetters()
	{

	}

	public function testCreate()
	{	
		$product = $this->product;
		$data = array(

			'family' => 'GigTicket',
			'category_id' => 5,
			'sku' => 'WPC_B1_5',
			'name' => 'Easter Gig',
			'price' => '97.00',
			'brief_description' => 'The Gigger\'s Gig',
			'description' => 'This is the gig that will blow your mind. You have never been to a gig like this.',
			'tags' => array('gig', 'easter', 'live show', 'paid gig' ),
			'properties' => (object) array( '1' =>  array('venue' => 'St Albans Square'), '12' =>  array('band' => 'Aeden Rain'), '5' => array('start_time' => '10:30AM'), '7' => array('date' => '25th December, 2013')),

		);

		$data = (object) $data;
		
		//pre($data);

		$product->create($data);
		$product_id = $product->getId();

		$this->assertNotNull($product_id); //Once the product has been created, the object needs to include the id. It cannot be null.
		$this->assertIsA($product_id, 'int'); //The id must be an integer
		$positive = ($product_id > -1);
		$this->assertTrue($positive);

	}


	public function testGet()
	{
		$product_id = 1;
		$product = $this->product;

		$product->get($product_id);






	}
	public function testUpdate()
	{

	}


	public function testRemove()
	{

	}


	public function testGetAll()
	{


	}
}
?>