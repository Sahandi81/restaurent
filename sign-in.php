<?php

use inputFiltering\Security;
require_once 'engine/Class/vendor/autoload.php';
if (isset($_POST['type']) && $_POST['type'] == 'sign-in'){
    $postData = new Security($_POST);
    $postData = $postData->xssClean();
    $signing  = new \Accounting\SignIn($postData);
    $signing  = $signing->addUser();
    print_r($signing);
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>ورود</title>
</head>
<body>

<div class="container">
    <div class="bg-img">
        <div class="form-login">
            <form class="form" id="form" method="post">
                <div class="title-form">
                    <h1> ورود </h1>
                    <h2><a href="sign-up.php"> ثبت نام </a></h2>
                </div>

                <div class="input-text">
                    <label for="email"></label><input type="text" style="color: black !important;" class="input email" id="email" name="email" placeholder="ایمیل">
                    <input type="hidden" name="type" value="sign-in">
                    <label for="password"></label><input type="password" style="color: black !important;" class="input password" id="password" name="password" placeholder="پسورد">
                </div>

                <button type="submit" id="submit" class="btn-login"> ثبت نام </button>
                <p><a href="forget-password.php"> فراموشی پسورد </a></p>
            </form>
        </div>
    </div>
</div>


</body>
</html>
