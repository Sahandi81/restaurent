<?php

use Bills\Receipt;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userData = new UserData();
$userData = $userData->userLogged();
$bill = new Receipt();
$bill = $bill->getBill();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/confirm-bill.css">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <title>تائید صورتحساب</title>
</head>
<body>

<header class="header">
    <nav class="navbar db-flex-between">
        <div class="db-flex-between item-holder">
            <a href="index.php">
                <img src="public/img/logo/humbrg.png" class="logo" alt="logo"/>
            </a>
            <a href="user-profile.php">
                <div class="info-user">
                    <span class="info"> <?= $userData->username ?> </span>
                    <img src="public/img/icon/user.png" class="user" alt="">
                </div>
            </a>
        </div>
    </nav>
</header>

<div class="container">
    <div class="bg-img">
        <div class="bill confirm-list">
            <img src="public/img/logo/mac-donalds.png" alt="logo" class="logo-m">
            <h2 class="text-h2"> صورتحساب </h2>
            <div class="list-bill">
                <ul class="list-food">
					<?php if (!empty($bill['hamberger2'])) { ?>
                        <div class="div-text">
                            <li class="text-food">چیز برگر</li>
                            <li class="number-text"><?= $bill['hamberger2'] ?></li>
                        </div>
					<?php } ?>
					<?php if (!empty($bill['count-drink'])) { ?>
                        <div class="div-text">
                            <li class="text-food">نوشابه کوکاکولا</li>
                            <li class="number-text"><?= $bill['count-drink'] ?></li>
                        </div>
					<?php } ?>
					<?php if (!empty($bill['hamberger3'])) { ?>
                        <div class="div-text">
                            <li class="text-food">سمبوسه</li>
                            <li class="number-text"><?= $bill['hamberger3'] ?></li>
                        </div>
					<?php } ?>
					<?php if (!empty($bill['hamberger1'])) { ?>
                        <div class="div-text">
                            <li class="text-food">همبرگر</li>
                            <li class="number-text"><?= $bill['hamberger1'] ?></li>
                        </div>
					<?php } ?>
                    <li class="food total"> جمع کل = <?= $bill['price'] ?> تومان</li>
                </ul>
            </div>

            <div class="shop">
                <img src="public/img/icon/shop-card.png" alt="icon">
                <h3><a href="food-list.php"> برگشت به خرید </a></h3>
            </div>

            <div class="btn-confirm">
                <a href="receipt.php">
                    <button type="button"> تایید</button>
                </a>
            </div>
        </div>

    </div>

    <div class="contact-us">
        <a href="#"><img src="public/img/icon/contactus.png" class="us-img" alt=""></a>
        <span> تماس با ما </span>
    </div>
</div>

</body>
</html>