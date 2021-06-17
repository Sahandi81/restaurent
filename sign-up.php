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
                    <h2><a href="sign-in.php"> ورود </a></h2>
                </div>
                <div class="title-form">
                    <h2 style="padding: 0 !important;"><a href="sign-up-restaurant.php" style="font-size: 15px"> ثبت رستوران </a></h2>
                </div>

                <input type="hidden" name="type" value="sing-up">
                <div class="input-text margn_bottm" id="input-text">
                    <label for="username"></label><input type="text" name="username" class="inpt username" id="username" placeholder="نام">

                </div>

                <div class="input-text margn_bottm" id="input-text">
                    <label for="email"></label><input type="email"  name="email" class="inpt email" id="email" placeholder="ایمیل">

                </div>

                <div class="input-text margn_bottm" id="input-text">
                    <label for="number"></label><input type="text" class="inpt number" name="phone" id="number" placeholder="شماره همراه">

                </div>

                <div class="input-text margn_bottm" id="input-text">
                    <label for="password"></label><input type="password" class="inpt password" name="password-1" id="password" placeholder="پسورد">

                </div>

                <div class="input-text margn_bottm" id="input-text">
                    <label for="password2"></label><input type="password" class="inpt conf-password" name="password-2" id="password2" placeholder="تکرار پسورد">

                </div>

                <button type="submit" id="submit" class="btn-signup"> ثبت نام </button>
            </form>
        </div>
    </div>
</div>

<div id="modalEl" class="modal">
    <div class="modal-content">
        <div class="challenge">
            <span class="close">&times;</span><br>
             <div class="card">
                <small class="small"></small>
             </div>
        </div>
    </div>
</div>


<script src="public/js/sign-up.js"></script>
</body>
</html>