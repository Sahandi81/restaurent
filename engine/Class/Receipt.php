<?php


namespace Bills;


use DataBase\dbConn;
use PDO;

class Receipt extends dbConn
{

	public string $countFood;
	public string $countDrink;
	public string $foodTypeOne;
	public string $foodTypeTwo;
	public string $foodTypeThree;
	public string $price;

	public function saveBill($cleanData): bool
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

	public function addBill($username)
	{
		if ($this->stmt() == true){
			session_start();
			$array = [
			'count_food' 	=> $_SESSION['bill']['count-food'],
			'count_drink' 	=> $_SESSION['bill']['count-drink'],
			'price' 		=> $_SESSION['bill']['price'],
			'hamberger1' 	=> $_SESSION['bill']['hamberger1'],
			'hamberger2' 	=> $_SESSION['bill']['hamberger2'],
			'hamberger3' 	=> $_SESSION['bill']['hamberger3']
			];
			$array = json_encode($array);
			session_commit();
			$this->dbConn->query("INSERT INTO `bill`(`username`, `details`) VALUES ('$username','$array')");

			return true;
		}else{
			return false;
		}
	}

	public function getClientBill($username)
	{
		if ($this->stmt() == true){
			$articles = $this->dbConn->query("SELECT `details` FROM `bill` WHERE `username`='$username' ORDER BY `id` DESC ");
			$articles->execute();
			$articles = $articles->fetchAll(PDO::FETCH_OBJ);

			return $articles;
		}
	}
}