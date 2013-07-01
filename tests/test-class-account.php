<?php
require_once('simpletest/autorun.php');
require_once(WPCART_PATH . 'includes/class-account.php');
 
class TestWPCartAccount extends UnitTestCase 
{	
	private $account;
	public function	__construct()
	{

		$this->account = new WPCartAccount;

	}

	public function testIsWPCartAccount()
	{
		$this->assertIsA($this->account, 'WPCartAccount');
	}

	public function testSetGetProperties()
	{
		$account = $this->account;

		$id = 1234;
		$setId = $account->setId($id);
		$this->assertSame($account, $setId);

		$username = 'jamie';
		$setUsername = $account->setUsername($username);
		$this->assertSame($account, $setUsername);


		$password = 'query1234';
		$setPassword = $account->setPassword($password);
		$this->assertSame($account, $setPassword);

		$email = 'pierro2006-seo@yahoo.co.uk';
		$setEmail = $account->setEmail($email);
		$this->assertSame($account, $setEmail);

		$this->assertNotNull($account->id);
		$this->assertIsA($account->id, 'int');
		$this->assertEqual($account->getId(), $account->id);

		$this->assertNotNull($account->username);
		$this->assertIsA($account->username, 'string');
		$this->assertEqual($account->getUsername(), $account->username);

		$this->assertNotNull($account->password);
		$this->assertIsA($account->password, 'string');
		$this->assertEqual($account->getPassword(), $account->password);


		$regex ='/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
		$this->assertPattern($regex, $account->email);
		$this->assertEqual($account->getEmail(), $account->email);



	}
}
?>