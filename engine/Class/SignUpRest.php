<?php


namespace Accounting;


use PDO;

class SignUpRest extends \DataBase\dbConn
{
	use \SecurityFunctions;

	protected array $array;
	protected string $username;
	protected string $email;
	protected string $phone;
	protected string $password;
	protected string $address;
	public string $time;


	public function __construct($cleanData)
	{
		$this->array = $cleanData;
		$this->email = $this->array['email'];
		$this->password = $this->array['password'];
		$this->phone = $this->array['phone'];
		$this->username = $this->array['name'];
		$this->address = $this->array['address'];
		$this->time = time();
	}

	public function addRest(): bool|string
	{
		if ($this->stmt() === true) {

			$this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$articles = $this->dbConn->prepare("SELECT `name`,`email`,`password` FROM `restaurant` WHERE `name`= :name OR `email`= :email");
			$articles->execute([':name' => $this->username, ':email' => $this->email]);
			$articles = $articles->fetchAll(PDO::FETCH_OBJ);

			if (count($articles) == 0){

				$this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$articles = $this->dbConn->prepare("SELECT `username`,`email`,`password` FROM `users` WHERE `username`= :username OR `email`= :email");
				$articles->execute([':username' => $this->username, ':email' => $this->email]);
				$articles = $articles->fetchAll(PDO::FETCH_OBJ);

				if (count($articles) == 0){

					$token = $this->setLoginCookie();
					$this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$articles = $this->dbConn->prepare("INSERT INTO `restaurant`(`name`, `phone`, `email`, `password`, `token`, `adderss`, `created_at`) VALUES ('$this->username', '$this->phone', '$this->email' , '$this->password', '$token', '$this->address', '$this->time')");
					$articles->execute();
					return true;

				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}