<?php


use Accounting\Restaurant;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userData = new UserData();
$userData = $userData->userLogged();
$restaurants = new Restaurant();
$restaurants = $restaurants->showRest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css"/>
    <link rel="stylesheet" href="public/css/confirm-bill.css"/>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css"/>
    <title>امتیاز</title>
</head>

<body>
<header class="header">
    <nav class="navbar db-flex-between">
        <div class="db-flex-between item-holder">
            <img src="public/img/logo/humbrg.png" class="logo" alt="logo"/>
            <div class="info-user">
                <img class="logo-m" src="public/img/icon/user.png" alt=""/>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="bg-img">
        <div class="score-container">
            <div class="bill wh-50 dis-flex">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide dis-flex">
								<?php
								$photos = ['img/product/arbys.jpg', 'img/product/hardees.png', 'img/product/wendys.jpg', 'img/product/tacobell.jpg', 'img/product/burger-king.png'];
								foreach ($restaurants

								as $restaurant){ ?>
                                <div class="ds-flex">
                                    <div class="score-box">
                                        <a href="list.php?q=<?= $restaurant->name ?>">
                                            <div class="product-img">
                                                <img src="public/<?= $photos[array_rand($photos)]; ?>"
                                                     class="translate-10 img arbys-img" alt=""/>
                                            </div>
                                        </a>
                                        <div class="my-slider">
                                            <a href="list.php?q=<?= $restaurant->name ?>">
                                                <span class="restaurant-name"><?= $restaurant->name ?></span>
                                            </a>
                                            <div class="star-rating translate-10">
                                                <span class="fa fa-star <?= $restaurant->score >= 50 ? 'checked' : ''; ?>"></span>
                                                <span class="fa fa-star <?= $restaurant->score >= 40 ? 'checked' : ''; ?>"></span>
                                                <span class="fa fa-star <?= $restaurant->score >= 30 ? 'checked' : ''; ?>"></span>
                                                <span class="fa fa-star <?= $restaurant->score >= 20 ? 'checked' : ''; ?>"></span>
                                                <span class="fa fa-star <?= $restaurant->score >= 10 ? 'checked' : ''; ?>"></span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                                <symbol id="star" viewBox="0 0 26 28">
                                                    <path d="M26 10.109c0 .281-.203.547-.406.75l-5.672 5.531 1.344 7.812c.016.109.016.203.016.313 0 .406-.187.781-.641.781a1.27 1.27 0 0 1-.625-.187L13 21.422l-7.016 3.687c-.203.109-.406.187-.625.187-.453 0-.656-.375-.656-.781 0-.109.016-.203.031-.313l1.344-7.812L.39 10.859c-.187-.203-.391-.469-.391-.75 0-.469.484-.656.875-.719l7.844-1.141 3.516-7.109c.141-.297.406-.641.766-.641s.625.344.766.641l3.516 7.109 7.844 1.141c.375.063.875.25.875.719z"/>
                                                </symbol>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
									<?php } ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-us">
            <a href="#">
                <img src="public/img/icon/contactus.png" class="us-img" alt=""/>
            </a>
            <span> تماس با ما </span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script src="public/js/splide-score.js"></script>
</body>
</html>
