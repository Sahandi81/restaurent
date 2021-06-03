<?php


namespace Accounting;


use PDO;

class ForgetPass extends \DataBase\dbConn
{

    protected array $array;
    protected string $email;
    protected string $password;
    public string $time;

    public function __construct($cleanData)
    {
        $this->array = $cleanData;
        $this->email = $this->array['email'];
        $this->password = $this->array['password'];
        $this->time = time();
    }

    public function updatePass()
    {
        if ($this->stmt() === true) {
            $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $articles = $this->dbConn->prepare("SELECT `username`,`email` FROM `users` WHERE `email`= :email");
            $articles->execute([':email' => $this->email]);
            $articles = $articles->fetchAll(PDO::FETCH_OBJ);
            if (count($articles) !== 0){
                $firstSalt = "j5mgag";
                $secondSalt = "28,3%$5V(Tu'XZV{y";
                $this->password = hash("sha1", $firstSalt . $this->password . $secondSalt);

                $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $stmt = $this->dbConn->prepare("UPDATE `users` SET `password`=:password WHERE `email`= :email");
                $stmt->execute([':password' => $this->password, ':email' => $this->email]);
                header('location: sign-in.php');
                return json_encode(['MSG' => 'PASSWORD_UPDATED']);
            } else {
                return json_encode(['MSG' => 'USER_NOT_EXIST']);
            }
        }
    }

}