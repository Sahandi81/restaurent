<?php


namespace Bills;


use DataBase\dbConn;

class Receipt extends dbConn
{

	public string $countFood;
	public string $countDrink;
	public string $foodTypeOne;
	public string $foodTypeTwo;
	public string $foodTypeThree;
	public string $price;

	public function saveBill($cleanData)
	{

		$this->countFood 	= $cleanData['count-food'];
		$this->countDrink 	= $cleanData['count-drink'];
		$this->foodTypeOne 	= $cleanData['hamberger1'];
		$this->foodTypeTwo 	= $cleanData['hamberger2'];
		$this->foodTypeThree= $cleanData['hamberger3'];
		$this->price  = $cleanData['price'];
		session_start();
		$_SESSION['bill']['count-food']= $this->countFood;
		$_SESSION['bill']['count-drink']= $this->countDrink;
		$_SESSION['bill']['price']= $this->price;
		$_SESSION['bill']['hamberger1']= $this->foodTypeOne;
		$_SESSION['bill']['hamberger2']= $this->foodTypeTwo;
		$_SESSION['bill']['hamberger3']= $this->foodTypeThree;
		session_commit();
		header('Location: bill.php');
		return true;
	}

	public function getBill()
	{
		session_start();
		$bill = $_SESSION['bill'];
		session_commit();
		return $bill;
	}
	
}