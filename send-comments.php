<?php

use Accounting\Restaurant;
use Commenting\Comment;
use inputFiltering\Security;
use User\UserData;

require_once 'engine/Class/vendor/autoload.php';
$userData = new UserData();
$userData = $userData->userLogged();
$restaurants = new Restaurant();
$restaurant = $restaurants->getRest($_GET['q']);
if (isset($_POST['type']) && $_POST['type'] == 'comment'){
	$postData = new Security($_POST);
	$postData = $postData->xssClean();
    $comment  = new Comment();
    $comment->addComment($postData);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css"/>
    <link rel="stylesheet" href="public/css/send_comments.css"/>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <title>ارسال نظرات</title>
</head>

<body>
<header class="header">
    <nav class="navbar db-flex-between">
        <div class="db-flex-between item-holder">
            <img src="public/img/logo/humbrg.png" class="logo" alt="logo">
            <div class="info-user">
                <img class="logo-m mg-top-1" src="public/img/logo/mac-donalds.png" alt="">
            </div>
        </div>
    </nav>
</header>


<div class="container">
    <div class="bg-img">
        <form action="" method="post">
            <div class="bill wh-50 bill-slider">
                <div id="bill-container">
                    <div class="ds-flex">
                        <div class="comment-box">
                            <div class="comment-text">
                                <p class="text-box-2">
                                    <img src="public/img/product/arbys.jpg" class="logo prof-pic" alt="">
                                    <span> <?= $restaurant->name ?> </span>
                                </p>
                            </div>
                            <div class="reply">
                                <label>
                                    <input type="text" name="comment" placeholder="نظرات ..." class="text-box-2 reply-input" required>
                                </label>
                            </div>
                            <input type="hidden" name="type" value="comment">
                            <input type="hidden" name="restaurant" value="<?= $restaurant->name ?>">
                            <div class="rating">
                                <input type="radio" id="star5" class="star" name="rating" value="5"/><label
                                        for="star5"></label>
                                <input type="radio" id="star4" class="star" name="rating" value="4"/><label
                                        for="star4"></label>
                                <input type="radio" id="star3" class="star" name="rating" value="3"/><label
                                        for="star3"></label>
                                <input type="radio" id="star2" class="star" name="rating" value="2"/><label
                                        for="star2"></label>
                                <input type="radio" id="star1" class="star" name="rating" value="1"/><label
                                        for="star1"></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="send-butt">
                    <button type="submit" class="send" onclick="SendButton()">ارسال نظر</button>
                </div>
        </form>
    </div>
</div>
</div>

<script src="public/js/send-comments.js"></script>

</body>


</html>
