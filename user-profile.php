<?php

use Accounting\AccEdit;
use Bills\Receipt;
use inputFiltering\Security;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$user     = new UserData();
$userData = $user->userLogged();
$billClass = new Receipt();
$bills = $billClass->getClientBill($userData->username);

if (isset($_POST['type']) && $_POST['type'] == 'edit-profile'){
    $postData = new Security($_POST);
    $postData = $postData->xssClean();
    $signing  = new AccEdit($postData, $userData);
    $signing  = $signing->updateDetails();
    $userData = $user->userLogged();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css"/>
    <link rel="stylesheet" href="public/css/login.css" />
    <title>تایید لیست</title>
</head>

<body>
<div class="container">
    <div class="bg-img">
        <div class="form-login signing padd-left">
            <form class="form sign-form" method="post" id="form">
                <div class="db-flex">
                    <div class="input-text">
                        <input type="hidden" name="type" value="edit-profile">
                        <label>
                            <input type="text" class="input text-info username" value="<?= $userData->username ?>" id="username" disabled readonly placeholder="نام"/>
                        </label>
                        <label>
                            <input type="text" class="input text-info email" value="<?= $userData->email ?>" id="password" disabled readonly placeholder="ایمیل"/>
                        </label>
                        <label>
                            <input type="text" name="phone" class="input text-info email" value="<?= $userData->phone ?>" id="email" placeholder="شماره تماس"/>
                        </label>
                        <label>
                            <input type="password" class="input text-info password" id="password" value="123456" readonly disabled placeholder="پسورد"/>
                        </label>
                    </div>
                    <div class="input-text">
                        <label class="label-style">
                            <span class="btn-style">آدرس :</span>
                            <textarea name="address" class="input text-info" id="address" rows="5" placeholder="آدرس خود را وارد کنید"><?= $userData->address ?></textarea>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn-login"> تایید </button>
            </form>

            <div class="main-container">
                <div class="slider-bill" id="bill-container">
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                if (count($bills) != 0){
                                    foreach ($bills as $bill){
                                        $bill = json_decode($bill->details);
                                ?>
                                <li class="splide__slide slide">
                                    <div class="bill style bill-item sign-up-bill">
                                        <img src="public/img/logo/mac-donalds.png" class="logo-m donald" alt="donald"/>
                                        <div class="list-bill hambrg" style="display: inline-block">
                                            <ul class="list-food text">
												<?php if (!empty($bill->hamberger2)) { ?>
                                                    <div class="div-text">
                                                        <li class="text-food">چیز برگر</li>
                                                        <li class="number-text">2</li>
                                                    </div>
												<?php } ?>
												<?php if (!empty($bill->count_drink)) { ?>
                                                    <div class="div-text">
                                                        <li class="text-food">نوشابه کوکاکولا</li>
                                                        <li class="number-text">3</li>
                                                    </div>
												<?php } ?>
												<?php if (!empty($bill->hamberger3)) { ?>
                                                    <div class="div-text">
                                                        <li class="text-food">سیب زمینی سرخ کرده</li>
                                                        <li class="number-text">6</li>
                                                    </div>
												<?php } ?>
												<?php if (!empty($bill->hamberger1)) { ?>
                                                    <div class="div-text">
                                                        <li class="text-food">چیکن برگر</li>
                                                        <li class="number-text">8</li>
                                                    </div>
                                                <?php } ?>
                                                <li class="food total"> جمع کل = <?= $bill->price ?> تومان</li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                        }
								    }else{ ?>
                                <li class="splide__slide slide" style="color: #fff !important;">
                                    بدون سابقه خرید از سایت
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-us">
            <a href="#"><img src="public/img/icon/contactus.png" class="us-img" alt=""/></a>
            <span> تماس با ما </span>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script src="public/js/splide-sign-up-bill.js"></script>
</body>
</html>

