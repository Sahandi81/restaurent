<?php

use Accounting\SignUp;
use Accounting\SignUpRest;
use inputFiltering\Security;
require_once 'engine/Class/vendor/autoload.php';
if (isset($_POST['type']) && $_POST['type'] == 'sign-up'){
	$postData = new Security($_POST);
	$postData = $postData->xssClean();
	$signing  = new SignUpRest($postData);
	$signing  = $signing->addRest();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/login.css">
	<title>ورود</title>
</head>

<body>

<div class="container">
	<div class="bg-img">
		<div class="form-login">
			<form class="form" id="form" method="post">
				<div class="title-form">
					<h1> ثبت نام </h1>
					<h2><a href="sign-in.php"> ورود </a></h2>
				</div>
                <?php
                if (isset($signing) && $signing === false){
                ?>
                همچین یوزر نیمی قبلا وجود دارد
                <?php }elseif (isset($signing) && $signing === true){ ?>
                با موفقیت ساخته شد
                <?php } ?>
                <input type="hidden" name="type" value="sign-up">
				<div class="db-flex">
					<div class="input-text">
						<label>
							<input type="text" name="name" class="input email" id="name" placeholder="اسم رستوران">
						</label>
						<label>
							<input type="text" name="phone" class="input email" id="password" placeholder="شماره تماس">
						</label>
						<label>
							<input type="text" name="email" class="input email" id="email" placeholder="ایمیل">
						</label>
						<label>
							<input type="password" name="password" class="input password" id="password-1" placeholder="پسورد">
						</label>
						<label>
							<input type="password" class="input password" id="password-2" placeholder="تکرار پسورد">
						</label>
					</div>
					<div class="input-text">
                        <label class="label-style">
							<span class="btn-style">آدرس :</span>
							<textarea name="address" class="input" id="address" rows="5"
									  placeholder="آدرس خود را وارد کنید"></textarea>
						</label>
					</div>

				</div>

				<button type="submit" id="submit" class="btn-login"> ثبت نام </button>
				<p><a href="forget-password.php"> فراموشی پسورد </a></p>
			</form>
		</div>
	</div>
</div>


</body>

</html>
