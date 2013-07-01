<?php
class WPCartCart
{	
	var $items;

	public function __construct(){

		//session_start();

		if(empty($_SESSION['cart'])){

			$_SESSION['cart'] = array();

		} else {

			$this->items = $_SESSION['cart'];

		}

	}

	public function addItem($item_id, $quantity=1)
	{	

		if(!isset($_SESSION['cart'][$item_id])){

			$_SESSION['cart'][$item_id] = array( 'quantity' => 0 );

		} 

		$_SESSION['cart'][$item_id]['quantity'] += $quantity;

		$item = $_SESSION['cart'][$item_id];
		
		return $item;

	}

	public function removeItem($index)
	{	
		unset($_SESSION['cart'][$index]);
	}

	public function getItems()
	{
		$this->items = $_SESSION['cart'];

		return $this->items;
	}

	public function changeItemQuantity($item_id, $quantity)
	{
		$item = $_SESSION['cart'][$item_id];
		$item['quantity'] = $quantity;
		
		$_SESSION['cart'][$item_id] = $item;

		return $item;
	}

	public function emptyCart()
	{
		$_SESSION['cart'] = array();
	}
	
}
?>