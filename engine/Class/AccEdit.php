<?php


namespace Accounting;


class AccEdit extends \DataBase\dbConn
{
    protected array $array;
    protected string $phone;
    protected string $address;
    protected string $username;

    public function __construct($cleanData, $userData)
    {
        $this->array 	= $cleanData;
        $this->phone 	= $this->array['phone'];
        $this->address 	= $this->array['address'];
        $this->username	= $userData->username;
    }

    public function updateDetails()
    {
    	if ($this->stmt()){
			$this->dbConn->query("UPDATE `users` SET `address`='$this->address', `phone`='$this->phone' WHERE `username`='$this->username'");
			return true;
        }
    }
}