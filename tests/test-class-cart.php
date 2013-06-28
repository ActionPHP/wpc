<?php
require_once('simpletest/autorun.php');
require_once('../includes/class-cart.php');
 
class TestWPCartCart extends UnitTestCase 
{
	public function __construct()
	{
		$this->cart = new WPCartCart;

	}

	public function testCartIsWPCartCart(){

		$cart = $this->cart;
		$this->assertIsA($cart, 'WPCartCart');
		$cart = $this->cart->getItems();
		$this->assertFalse($cart); //The cart should be empty at initialization.
	}

	public function testAddItem()
	{	
		$cart = $this->cart->getItems();

		$total = count($cart); //We want to know how many items there currently are in the cart.

		$item_id = 1234;
		$item = $this->cart->addItem($item_id);

		$this->assertIsA($item, 'Array'); //Let's ensure that we are getting an array that contains the product and it's quantity etc.
		$this->assertIsA($item['quantity'], 'int');
		$this->assertEqual($item['quantity'], 1); //Let's make sure there is only 1 of the item added.

		$cart2 = $this->cart->getItems(); //Ok let's count all the items after adding the item
		$total2 = count($cart2);

		$difference = $total2 - $total; //Let's subtract from the first total to ensure the item has been added.
		$this->assertEqual($difference, 1); //The item has been added

		//Let's test what happens if we add an item of the same kind but different quantity.

		$quantity = 2;

		$item2 = $this->cart->addItem($item_id, $quantity);

		$this->assertEqual($item2['quantity'], 3); //The quantity should have been increased.

	}

	public function testChangeItemQuantity()
	{

		$item_id = 9012;
		$quantity = 5;
		$item = $this->cart->addItem($item_id, $quantity);
		
		$quantity2 = 7;

		$changed = $this->cart->changeItemQuantity($item_id, $quantity2);
		$this->assertEqual($changed['quantity'], $quantity2);
		
		$cart = $this->cart->getItems();
		$this->assertEqual($cart[$item_id]['quantity'], $changed['quantity']);
		
	}

	public function testGetItems(){

		$cart = $this->cart;
		$cart->addItem(2354); //Let's add an item to make sure the cart is not empty.

		$items = $cart->getItems();
		$total = count($items);

		$this->assertNotNull($items);
		$this->assertIsA($items, 'Array');
	}

	public function testRemoveItem()
	{	
		//First let's another item and get it's index

		$item_id = 5678;

		$index = $this->cart->addItem($item_id);
		$items = $this->cart->getItems();
		$total = count($items);

		$this->cart->removeItem($item_id); //We are removing the item we just added

		$items2 = $this->cart->getItems(); //Let's fetch the items in the cart again.
		$total2 = count($items2);

		//There should be one less item in the cart now

		$difference = $total - $total2;

		$this->assertEqual($difference, 1);

	}

	public function testEmptyCart()
	{
		$this->cart->emptyCart();

		$items = $this->cart->getItems();

		$this->assertFalse($items);
	}

	public function testItemQuantities()
	{



	}

}
?>