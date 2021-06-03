<?php


namespace Accounting;

use DataBase\dbConn;
use PDO;

class SignUp extends dbConn
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
        $this->username = $this->array['username'];
        $this->email = $this->array['email'];
        $this->phone = $this->array['phone'];
        $this->password = $this->array['password-1'];
        $this->time = time();
    }


    public function addUser(): bool|string
    {
        if ($this->stmt() === true) {

            $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $articles = $this->dbConn->prepare("SELECT `username`,`email` FROM `users` WHERE `username`= :username OR `email`= :email");
            $articles->execute([':username' => $this->username, ':email' => $this->email]);
            $articles = $articles->fetchAll(PDO::FETCH_OBJ);

            if (count($articles) == 0) {

                $token = $this->setLoginCookie();

                $this->dbConn->query("INSERT INTO `users`(`username`, `email`, `token`, `password`, `phone`, `created_at`) VALUES ('$this->username','$this->username','$token','$this->password','$this->phone','$this->time')");
                return json_encode(['MSG' => 'SUCCESSFULLY']);
            }else{
                return json_encode(['MSG' => 'USER_EXISTS']);
            }
        }
    }

}