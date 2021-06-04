<?php


use Bills\Receipt;
use inputFiltering\Security;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userData = new UserData();
$userData = $userData->userLogged('index');


if (isset($_POST['type']) && $_POST['type'] == 'bill') {
	$postData = new Security($_POST);
	$postData = $postData->xssClean();
	$signing  = new Receipt($postData);
	print_r($signing);
	die();
}
?>
?>
<!DOCTYPE html>
<!--suppress ALL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/list.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          crossorigin="anonymous"/>
    <title>افزودن لیست</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css"/>
</head>
<body>

<header class="header">
    <nav class="navbar db-flex-between">
        <div class="db-flex-between item-holder">
            <img src="public/img/logo/humbrg.png" class="logo" alt="logo"/>
            <div class="info-user">
                <img class="logo-m user" src="public/img/icon/user.png" alt="">
            </div>
        </div>
    </nav>
</header>

<div class="main-container">
    <div id="bill-container">
        <div class="bill-item">
            <form action="" method="post">
                <input type="hidden" name="type" value="bill">
                <div class="bill-item__info">
                    <label>
                        <input type="text" name="price" class="input discount" placeholder="قیمت"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input work-hour" placeholder="ساعت کاری"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" name="count" class="input add-food addfood" placeholder="افزودن غذا"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input add-drink" placeholder="افزودن نوشیدنی"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <div class="btn-confirm">
                        <button type="submit"> تایید </button>
                    </div>
                </div>
            </form>
            <div class="bill-item__foods">
                <div class="food-item one">
                    <span class="food-item-order number-one"> 1 </span>
                    <div class="food-item-images">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(1000)">سفارش</button>
                        </div>
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(1000)">سفارش</button>
                        </div>
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(1000)">سفارش</button>
                        </div>
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(1000)">سفارش</button>
                        </div>
                    </div>
                </div>
                <div class="food-item two">
                    <span class="food-item-order"> 2 </span>
                    <div class="food-item-images">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-two">
                            <button type="button" class="price" onclick="number(2000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(2000)">سفارش</button>
                        </div>
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-two">
                            <button type="button" class="price" onclick="number(2000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(2000)">سفارش</button>
                        </div>
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-two">
                            <button type="button" class="price" onclick="number(2000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(2000)">سفارش</button>
                        </div>
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-two">
                            <button type="button" class="price" onclick="number(2000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(2000)">سفارش</button>
                        </div>
                    </div>
                </div>
                <div class="food-item three">
                    <span class="food-item-order number-three"> 3 </span>
                    <div class="food-item-images">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-three">
                            <button type="button" class="price" onclick="number(3000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(3000)">سفارش</button>
                        </div>
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-three">
                            <button type="button" class="price" onclick="number(3000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(3000)">سفارش</button>
                        </div>
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-three">
                            <button type="button" class="price" onclick="number(3000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(3000)">سفارش</button>
                        </div>
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-three">
                            <button type="button" class="price" onclick="number(3000)">قیمت</button>
                            <button type="button" class="list" onclick="myFunction(3000)">سفارش</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bill-item"></div>

    </div>

    <div class="bill-controls-container">
        <button class="arrow up">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>
        <button class="arrow down">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
        </button>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script src="public/js/slider.js"></script>
</body>
</html>
