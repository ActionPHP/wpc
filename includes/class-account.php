<?php
class WPCartAccount
{

	public $id;
	public $username;
	public $password;
	public $email;

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getEmail()
	{
		return $this->email;
	}


	public function setId($id)
	{
		$this->id = $id;
		return $this;

	}

	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}


	
}
?>