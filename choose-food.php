<?php


use Bills\Receipt;
use inputFiltering\Security;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userDetails = new UserData();
$userData = $userDetails->userLogged('restaurant');
$userDetails->thisIsKarfarma($userData->role);
$food = new Receipt();
$food = $food->getFood();

if (isset($_POST['type']) && $_POST['type'] == 'restaurant-bill') {
	$postData = new Security($_POST);
	$postData = $postData->xssClean();
	$bill = new Receipt();
	$bill->editFood($postData);
	die('db Error');
}
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
    <title>افزودن غذا</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css"/>
</head>
<body>

<header class="header">
    <nav class="navbar db-flex-between">
        <div class="db-flex-between item-holder">
            <img src="public/img/logo/humbrg.png" class="logo" alt="logo"/>
            <a href="user-profile.php">
                <div class="info-user">
                    <img src="public/img/icon/user.png" class="user" alt="">
                </div>
            </a>
        </div>
    </nav>
</header>

<div class="main-container">
    <div id="bill-container">
        <div class="bill-item">
            <form action="" method="post">
                <input type="hidden" name="type" value="restaurant-bill">
                <input type="hidden" name="hamberger-1-1" class="hamberger-1-1" value="<?= $food['hamberger-1-1'] ?>">
                <input type="hidden" name="hamberger-1-2" class="hamberger-1-2" value="<?= $food['hamberger-1-2'] ?>">
                <input type="hidden" name="hamberger-1-3" class="hamberger-1-3" value="<?= $food['hamberger-1-3'] ?>">
                <input type="hidden" name="hamberger-2-1" class="hamberger-2-1" value="<?= $food['hamberger-2-1'] ?>">
                <input type="hidden" name="hamberger-2-2" class="hamberger-2-2" value="<?= $food['hamberger-2-2'] ?>">
                <input type="hidden" name="hamberger-2-3" class="hamberger-2-3" value="<?= $food['hamberger-2-3'] ?>">
                <input type="hidden" name="hamberger-3-1" class="hamberger-3-1" value="<?= $food['hamberger-3-1'] ?>">
                <input type="hidden" name="hamberger-3-2" class="hamberger-3-2" value="<?= $food['hamberger-3-2'] ?>">
                <input type="hidden" name="hamberger-3-3" class="hamberger-3-3" value="<?= $food['hamberger-3-3'] ?>">
                <input type="hidden" name="coca-1" class="coca-1"  value="<?= $food['coca-1'] ?>" >
                <input type="hidden" name="coca-2" class="coca-2"  value="<?= $food['coca-2'] ?>" >
                <input type="hidden" name="coca-3" class="coca-3"  value="<?= $food['coca-3'] ?>" >
                <button type="submit" id="submit" class="btn-signup"> ثبت منو </button>
            </form>
        <div class="bill-item__foods">
            <div class="food-item one">
                <span class="food-item-order number-one"> 1 </span>
                <div class="food-item-images disp_flex">
                    <div class="div-img">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list coca-1" onclick="myFunction(1000,event)">سفارش</button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number">
                            <span class="add-number"><?= $food['coca-1'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-1-1" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number">
                            <span class="add-number hamberger1"><?= $food['hamberger-1-1'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-1-2" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-1-2">
                            <span class="add-number hamberger2"><?= $food['hamberger-1-2'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-1-3" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-1-3">
                            <span class="add-number hamberger3"><?= $food['hamberger-1-3'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="food-item two">
                <span class="food-item-order"> 2 </span>
                <div class="food-item-images disp_flex">
                    <div class="div-img">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list coca-2" onclick="myFunction(1000,event)">سفارش</button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number">
                            <span class="add-number"><?= $food['coca-2'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-2-1" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-2-1">
                            <span class="add-number"><?= $food['hamberger-2-1'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-2-2" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-2-2">
                            <span class="add-number"><?= $food['hamberger-2-2'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-2-3" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-2-3">
                            <span class="add-number hamberger3"><?= $food['hamberger-2-3'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="food-item three">
                <span class="food-item-order number-three"> 3 </span>
                <div class="food-item-images disp_flex">
                    <div class="div-img">
                        <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list coca-3" onclick="myFunction(1000,event)">سفارش</button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number">
                            <span class="add-number"><?= $food['coca-3'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-3-1" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-3-1">
                            <span class="add-number hamberger1"><?= $food['hamberger-3-1'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-3-2" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-3-2">
                            <span class="add-number"><?= $food['hamberger-3-2'] ?></span>
                        </div>
                    </div>
                    <div class="div-img">
                        <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                        <div class="button section-one">
                            <button type="button" class="price" onclick="number(1000)">قیمت</button>
                            <button type="button" class="list hamberger-3-3" onclick="myFunction(1000,event)">سفارش
                            </button>
                            <button type="button" class="negative" onclick="btn(1000,event)"><i
                                        class="fas fa-minus"></i></button>
                        </div>
                        <div class="text-number hamberger-3-3">
                            <span class="add-number hamberger3"> <?= $food['hamberger-3-3'] ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bill-controls-container">
        <button class="arrow up">
        </button>
        <button class="arrow down">
        </button>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script src="public/js/slider-restaurant.js"></script>
</body>
</html>
