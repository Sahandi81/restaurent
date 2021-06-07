<?php


namespace Accounting;


use PDO;

class SignIn  extends \DataBase\dbConn
{
    use \SecurityFunctions;

    protected array $array;
    protected string $username;
    protected string $email;
    protected string $phone;
    protected string $password;
    public string $time;


    public function __construct($cleanData)
    {
        $this->array = $cleanData;
        $this->email = $this->array['email'];
        $this->password = $this->array['password'];
    }


    public function addUser(): bool|string
    {
        if ($this->stmt() === true) {

            $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $articles = $this->dbConn->prepare("SELECT `username`,`email`,`password` FROM `users` WHERE `username`= :username OR `email`= :email");
            $articles->execute([':username' => $this->email, ':email' => $this->email]);
            $articles = $articles->fetchAll(PDO::FETCH_OBJ);

            if (count($articles) == 0){
				$this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$articles = $this->dbConn->prepare("SELECT `name`,`email`,`password` FROM `restaurant` WHERE `name`= :username OR `email`= :email");
				$articles->execute([':username' => $this->email, ':email' => $this->email]);
				$articles = $articles->fetchAll(PDO::FETCH_OBJ);
			}

            if (count($articles) !== 0) {


                $firstSalt = "j5mgag";
                $secondSalt = "28,3%$5V(Tu'XZV{y";
                $this->password = hash("sha1", $firstSalt . $this->password . $secondSalt);

                if ($articles[0]->password === $this->password) {

                    $this->username = $articles[0]->username;
                    $this->email = $articles[0]->email;

                    $this->setLoginCookie();

                    return json_encode(['MSG' => 'SUCCESSFULLY']);
                } else{
                    return json_encode(['MSG' => 'WRONG_PASSWORD']);

                }
            } else {
                return json_encode(['MSG' => 'USER_NOT_EXIST']);
            }
        }
    }
}