<?php


namespace User;


use DataBase\dbConn;
use PDO;

class UserData extends dbConn
{
    use \SecurityFunctions;


    private function cookieExits() :bool
    {
        if (!isset($_COOKIE['logged_in']) || !isset($_COOKIE['userInfo']) ){
            return false;
        }else{
            return TRUE;
        }
    }

    public function userLogged($page = null)
    {
        if ($this->cookieExits()) {
            if ($this->stmt() === true) {
                $cookieToken = $_COOKIE['logged_in'] . $_COOKIE['userInfo'];
                $cookieToken = $this->cookieHashing($cookieToken);
                $token = $_SERVER['HTTP_USER_AGENT'];
                $token = $this->cookieHashing($token);
                $token = $token . $_COOKIE['userInfo'];
                $token = $this->cookieHashing($token);

                if ($cookieToken == $token){
                    $this->dbConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $articles = $this->dbConn->prepare("SELECT * FROM users WHERE `token`=:token");
                    $articles->execute([':token' => $cookieToken]);
                    $articles = $articles->fetchAll(PDO::FETCH_OBJ);

                    $foundedRows = count($articles);
                    if ($foundedRows == 0) header('Location: sign-up.php');


                    return $articles[0];
                }
            } else {
                if ($page != 'index'){

                    setcookie('userInfo', '', time() - 48000, "/", null, null, true);
                    setcookie('logged_in', '', time() - 48000, "/", null, null, true);
                    header('Location: sign-up.php');

                }else{
                    return false;
                }
            }
        }else{
            if ($page != 'index'){
                header('Location: sign-up.php');
                die();
            }else{
                return false;
            }
        }
    }

}
