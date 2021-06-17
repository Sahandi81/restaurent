<?php

use inputFiltering\Security;
require_once 'engine/Class/vendor/autoload.php';
if (isset($_POST['type']) && $_POST['type'] == 'forget-pass'){
    $postData = new Security($_POST);
    $postData = $postData->xssClean();
    $signing  = new \Accounting\ForgetPass($postData);
    $signing  = $signing->updatePass();
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
    <title>تغییر پسورد</title>
</head>
<body>

<div class="container">
    <div class="bg-img">
        <div class="form-login">
            <form class="form" id="form" method="post">
                <div class="title-form">
                    <h1 style="color: #fff !important;"> فراموشی رمز عبور </h1>
                </div>
                <div class="input-text">
                    <input type="hidden" name="type" value="forget-pass">
                    <label for="email"></label><input style="color: black !important;" type="text" class="input email" name="email" id="email" placeholder="ایمیل">

                    <label for="code"></label><input style="color: black !important;" type="text" class="input code" name="code" id="code" placeholder="کد را وارد کنید">
                    <label class="code"><a href="#"> ارسال دوباره </a></label>

                    <label for="password"></label><input style="color: black !important;" type="text" class="input password" name="password-1" id="password" placeholder="پسورد جدید">

                    <label for="password2"></label><input style="color: black !important;" type="text" class="input password2" id="password2" placeholder="تکرار پسورد">
                </div>

                <button type="submit" id="submit" class="btn-login"> تایید </button>
            </form>
        </div>

        <div class="contact-us">
            <a href="#"><img src="public/img/icon/contactus.png" class="us-img" alt=""></a>
            <span> تماس با ما </span>
        </div>

    </div>
</div>

</body>
</html>