<?php


namespace Accounting;


use PDO;

class Restaurant extends \DataBase\dbConn
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
}