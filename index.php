<?php

use inputFiltering\Security;

require_once 'engine/Class/vendor/autoload.php';
$userData = new \User\UserData();
$userData = $userData->userLogged('index');
?>

<?php if ($userData == false){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <title>کاربر</title>
    </head>
    <body>

    <header class="header">
        <nav class="navbar db-flex-between">
            <div class="db-flex-between item-holder">
                <img src="public/img/logo/humbrg.png" class="logo" alt="logo"/>
                <div class="info-user">
                    <span class="info"> نام کاربری </span>
                    <img src="public/img/icon/user.png" class="user" alt="">
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="bg-img">
            <h1> رزرو رستوران </h1><br>
            <div class="link-btn">
                <div class="select-city">
                    <select name="city" id="city">
                        <option value="city">شهر</option>
                        <option value="volvo">تهران</option>
                        <option value="saab">کرج</option>
                        <option value="saab">اصفهان</option>
                        <option value="saab">شیراز</option>
                    </select>
                </div>
                <div class="search-box">
                    <form onsubmit="event.preventDefault();" role="search">
                        <label for="search">رستوران</label>
                        <input id="search" type="search" placeholder="رستوران" autofocus required />
                    </form>
                </div>
            </div>

            <div class="item">
                <ul class="list-item">
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-facebook-messenger"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-facebook-square"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    </body>
    </html>
<?php }else {?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
        <title>صفحه اصلی</title>
    </head>
    <body>

    <header class="header">
        <nav class="navbar db-flex-between">
            <a href="user-profile.php">
                <div class="info-user">
                    <span class="info"> <?= $userData->username ?> </span>
                    <img src="public/img/icon/user.png" class="user" alt="">
                </div>
            </a>
        </nav>
    </header>

    <div class="container">
        <div class="bg-img">
            <h1> رزرو رستوران </h1><br>
            <div class="link-btn">
                <div class="select-city">
                    <select name="city" id="city">
                        <option value="city">شهر</option>
                        <option value="volvo">تهران</option>
                        <option value="saab">کرج</option>
                        <option value="saab">اصفهان</option>
                        <option value="saab">شیراز</option>
                    </select>
                </div>
                <div class="search-box">
                    <form onsubmit="event.preventDefault();" role="search">
                        <label for="search">رستوران</label>
                        <input id="search" type="search" placeholder="رستوران" autofocus required />
                    </form>
                </div>
            </div>

            <div class="item">
                <ul class="list-item">
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-facebook-messenger"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-icon"><a href="#" class="i-holder"><i class="fab fa-facebook-square"></i></a></li>
                </ul>
            </div>
        </div>
    </div>


    </body>
    </html>
<?php } ?>