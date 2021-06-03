<?php


use JetBrains\PhpStorm\Pure;

trait SecurityFunctions
{

    #[Pure] protected function cookieHashing(string $token) : string
    {
        $firstSalt  = "j5mgag$@#";
        $secondSalt = "28,XJ5V(Tu'XZV{y";
        return hash("sha1", $firstSalt . $token . $secondSalt);
    }
    protected function setLoginCookie(): string
    {
        setcookie('userInfo', '', time() - 48000, "/", null, null, true);
        setcookie('logged_in', '', time() - 48000, "/", null, null, true);

        $userPass = $this->username . $this->email . $this->password;
        $userPassHashed = $this->cookieHashing($userPass);

        setcookie('userInfo', $userPassHashed, time() + 60 * 60 * 24 * 30, "/", null, null, true);

        $token = $_SERVER['HTTP_USER_AGENT'];
        $token = $this->cookieHashing($token);

        setcookie('logged_in', $token, time() + 60 * 60 * 24 * 30 , "/", null, null, true);

        $token = $token . $userPassHashed;
        $token = $this->cookieHashing($token);
        return $token;
    }

}