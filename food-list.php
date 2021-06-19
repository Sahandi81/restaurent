<?php


use Bills\Receipt;
use inputFiltering\Security;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userData = new UserData();
$userData = $userData->userLogged();
$food = new Receipt();
$food = $food->getFood();

if (isset($_POST['type']) && $_POST['type'] == 'bill') {
	$postData = new Security($_POST);
	$postData = $postData->xssClean();
	$bill = new Receipt();
	$bill->saveBill($postData);
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
                <input type="hidden" name="type" value="bill">
                <div class="bill-item__info input-text">
                    <label>
                        <input type="text" class="input discount" name="price" placeholder="قیمت" required><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input work-hour" placeholder="ساعت کاری"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input add-food" name="count-food" placeholder="افزودن غذا"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input add-drink" name="count-drink"
                               placeholder="افزودن نوشیدنی"><span><i class="fas fa-plus"></i></span>
                    </label>
                    <input type="hidden" name="hamberger1" class="hamberger1" value="0">
                    <input type="hidden" name="hamberger2" class="hamberger2" value="0">
                    <input type="hidden" name="hamberger3" class="hamberger3" value="0">
                    <button type="submit" id="submit" class="btn-signup" style="text-align: center;"> تایید</button>
                </div>
            </form>
            <div class="bill-item__foods">
                <div class="food-item one">
                    <span class="food-item-order number-one"> 1 </span>
                    <div class="food-item-images disp_flex">
                        <?php if ($food['coca-1']) {?>
                        <div class="div-img">
                            <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-1-1'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger1"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-1-2'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger2"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-1-3'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger3"></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="food-item two">
                    <span class="food-item-order"> 2 </span>
                    <div class="food-item-images disp_flex">
                        <?php if ($food['coca-2'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-2-1'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger1"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-2-2'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number hamberger2">
                                <span class="add-number"></span>
                            </div>
                        </div>
						<?php } if ($food['hamberger-2-3'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger3"></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="food-item three">
                    <span class="food-item-order number-three"> 3 </span>
                    <div class="food-item-images disp_flex">
                            <?php if ($food['coca-3'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number"></span>
                            </div>
                        </div>
							<?php } if ($food['hamberger-3-1'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger1"></span>
                            </div>
                        </div>
							<?php } if ($food['hamberger-3-2'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number hamberger2">
                                <span class="add-number"></span>
                            </div>
                        </div>
							<?php } if ($food['hamberger-3-3'] > 0) {?>
                        <div class="div-img">
                            <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                            <div class="button section-one">
                                <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                <button type="button" class="negative" onclick="btn(1000,event)"><i
                                            class="fas fa-minus"></i></button>
                            </div>
                            <div class="text-number">
                                <span class="add-number hamberger3"></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="bill-item">
            <form action="" method="post">
                <input type="hidden" name="type" value="bill">
                <div class="bill-item__info input-text">
                    <label>
                        <input type="text" class="input discount" name="price" placeholder="قیمت" required><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input work-hour" placeholder="ساعت کاری"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input add-food" name="count-food" placeholder="افزودن غذا"><span><i
                                    class="fas fa-plus"></i></span>
                    </label>
                    <label>
                        <input type="text" class="input add-drink" name="count-drink"
                               placeholder="افزودن نوشیدنی"><span><i class="fas fa-plus"></i></span>
                    </label>
                    <input type="hidden" name="hamberger1" class="hamberger1" value="0">
                    <input type="hidden" name="hamberger2" class="hamberger2" value="0">
                    <input type="hidden" name="hamberger3" class="hamberger3" value="0">
                    <button type="submit" id="submit" class="btn-signup" style="text-align: center;"> تایید</button>
                </div>
            </form>
            <div class="bill-item__foods">
                <div class="food-item one">
                    <span class="food-item-order number-one"> 1 </span>
                    <div class="food-item-images disp_flex">
						<?php if ($food['coca-1']) {?>
                            <div class="div-img">
                                <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-1-1'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger1"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-1-2'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger2"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-1-3'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger3"></span>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
                <div class="food-item two">
                    <span class="food-item-order"> 2 </span>
                    <div class="food-item-images disp_flex">
						<?php if ($food['coca-2'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-2-1'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger1"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-2-2'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number hamberger2">
                                    <span class="add-number"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-2-3'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger3"></span>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
                <div class="food-item three">
                    <span class="food-item-order number-three"> 3 </span>
                    <div class="food-item-images disp_flex">
						<?php if ($food['coca-3'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/cocacola.png" class="hambrg drink" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction2(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn2(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-3-1'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/hamburger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger1"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-3-2'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/burger.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number hamberger2">
                                    <span class="add-number"></span>
                                </div>
                            </div>
						<?php } if ($food['hamberger-3-3'] > 0) {?>
                            <div class="div-img">
                                <img src="public/img/product/morsel.png" class="hambrg" alt="hamburger-image"/>
                                <div class="button section-one">
                                    <button type="button" class="price" onclick="number(1000)">قیمت</button>
                                    <button type="button" class="list" onclick="myFunction(1000,event)">سفارش</button>
                                    <button type="button" class="negative" onclick="btn(1000,event)"><i
                                                class="fas fa-minus"></i></button>
                                </div>
                                <div class="text-number">
                                    <span class="add-number hamberger3"></span>
                                </div>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>

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
