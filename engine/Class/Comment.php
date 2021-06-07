<?php


namespace Commenting;


use Accounting\Restaurant;
use DataBase\dbConn;
use PDO;

class Comment extends dbConn
{
	public array $array;

	public function getComments($rest)
	{

		if ($this->stmt() === true) {

			$stmt = $this->dbConn->prepare("SELECT * FROM `comments` WHERE `restaurant`= :restaurant ORDER BY `id` DESC ");
			$stmt->execute([':restaurant' => $rest]);
			$stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $stmt;

		}
		
	}

	public function addComment($cleanData)
	{

		$this->array = $cleanData;

		if ($this->stmt() === true) {
			$stmt = $this->dbConn->prepare("INSERT INTO `comments`(`restaurant`, `text`, `score`) VALUES (:restaurant, :text, :score)");
			$stmt->execute([':restaurant'=>$cleanData['restaurant'], ':text' => $cleanData['comment'], ':score' => $cleanData['rating'] . 0]);

			$rest = new Restaurant();
			$rest = $rest->getRest($cleanData['restaurant']);
			$userScore = $cleanData['rating'] . 0;
			$restScore = ((int)$rest->score + (int)$userScore) / 2;

			$stmt = $this->dbConn->prepare("UPDATE `restaurant` SET `score`= :score WHERE `name`= :restaurant");
			$stmt->execute([':score' => $restScore, ':restaurant' => $cleanData['restaurant']]);
			header('Location: comments.php?q=' . $cleanData['restaurant']);
			die();
		}
	}

}