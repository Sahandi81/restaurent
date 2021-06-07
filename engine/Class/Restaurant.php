<?php


namespace Accounting;


use DataBase\dbConn;
use PDO;

class Restaurant extends dbConn
{

	public function showRest()
	{
		if ($this->stmt()){
			$articles = $this->dbConn->query("SELECT * FROM `restaurant`");
			$articles->execute();
			$articles = $articles->fetchAll(PDO::FETCH_OBJ);
			return $articles;
		}
	}

	public function getRest($restaurantName)
	{
		if ($this->stmt()){

			$article = $this->dbConn->prepare("SELECT * FROM `restaurant` WHERE `name`= :name");
			$article->execute([':name' => $restaurantName]);
			$article = $article->fetch(PDO::FETCH_OBJ);
			return $article;
			
		}
	}
}