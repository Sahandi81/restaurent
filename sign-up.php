<?php

use inputFiltering\Security;
require_once 'engine/Class/vendor/autoload.php';
if (isset($_POST['type']) && $_POST['type'] == 'sing-up'){
    $postData = new Security($_POST);
    $postData = $postData->xssClean();
    $signing  = new \Accounting\SignUp($postData);
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
    <link rel="stylesheet" href="public/css/sign-up.css">
    <title>ثبت نام</title>
</head>
<body>

<div class="container">
    <div class="bg-img">
        <div class="form-signup">
            <form class="form" id="form" method="POST">
                <div class="title-form">
                    <h1> ثبت نام </h1>
                    <h2><a href="login.html"> ورود </a></h2>
                </div>

                <input type="hidden" name="type" value="sing-up">
                <div class="input-text" id="input-text">
                    <label for="username"></label><input type="text" name="username" class="inpt username" id="username" placeholder="نام">
                    <small>Error message</small>
                </div>

                <div class="input-text" id="input-text">
                    <label for="email"></label><input type="email"  name="email" class="inpt email" id="email" placeholder="ایمیل">
                    <small>Error message</small>
                </div>

                <div class="input-text" id="input-text">
                    <label for="number"></label><input type="text" class="inpt number" name="phone" id="number" placeholder="شماره همراه">
                    <small>Error message</small>
                </div>

                <div class="input-text" id="input-text">
                    <label for="password"></label><input type="password" class="inpt password" name="password-1" id="password" placeholder="پسورد">
                    <small>Error message</small>
                </div>

                <div class="input-text" id="input-text">
                    <label for="password2"></label><input type="password" class="inpt conf-password" name="password-2" id="password2" placeholder="تکرار پسورد">
                    <small id="small">Error message</small>
                </div>

                <button type="submit" id="submit" class="btn-signup"> ثبت نام </button>
            </form>
        </div>
    </div>
</div>

<script src="public/js/sign-up.js"></script>
</body>
</html>