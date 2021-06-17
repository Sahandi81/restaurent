<?php


namespace Accounting;


use DataBase\dbConn;
use PDO;
use SecurityFunctions;

class ForgetPass extends dbConn
{

	use SecurityFunctions;
    protected array $array;
    protected string $email;
    protected string $password;
    public string $time;

    public function __construct($cleanData)
    {
        $this->array = $cleanData;
        $this->email = $this->array['email'];
        $this->password = $this->array['password-1'];
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

				$token = $this->setLoginCookie();

                $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $stmt = $this->dbConn->prepare("UPDATE `users` SET `token`=:token, `password`=:password WHERE `email`= :email");
                $stmt->execute([':token' => $token,':password' => $this->password, ':email' => $this->email]);

                header('location: sign-in.php');
                return json_encode(['MSG' => 'PASSWORD_UPDATED']);
            } else {
                return json_encode(['MSG' => 'USER_NOT_EXIST']);
            }
        }
    }


}