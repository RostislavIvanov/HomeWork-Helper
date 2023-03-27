<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomeWork Helper</title>
	<link rel="shortcut icon" href="img/icons/favicon.png" type="image/png">
	<link rel="stylesheet" href="css/style.css" />
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
</head>
<body>
	<div class="wrapper">
		<div class="logo"><img src="img/icons/icon-white.png" alt=""></div>
		<h1 class="giant-title">HomeWork Helper</h1>
		<h2 class="little-title">Quick help with your homework</h2>
		<a href="#popup" class="button">Log in</a>
	</div>

	<div id = "popup" class="popup">
		<a href="#" class="popup__area"></a>
		<div class="popup__body">
			<div class="popup__content">
				
				<a href="#" class="popup__close">x</a>
				<form action="vendor/login.php" method="POST" enctype="multipart/form-data">

					<div class="popup-registration">
						<div class="popup__logo">
							HomeWork Helper
						</div>
						<input placeholder = "Your login" type="text" name="login" value="">
						<input placeholder = "Password" type="password" name="userpass">
						<button type = "submit">Log in</button>
						<a href="#popup_reg" class="">No account? <span>Register</span></a>
						<?php
						if ($_SESSION['sucess-reg']) {
							echo '<div class="sucess-reg">' . $_SESSION['sucess-reg'] . '</div>';
						};
						unset($_SESSION['sucess-reg']);
						?>

						<?php
						if ($_SESSION['message']) {
							echo '<div class="passunconf ">' . $_SESSION['message'] . '</div>';
						};
						unset($_SESSION['message']);
						?>
					</div>
				</form>

			</div>
		</div>
	</div>


	<div id = "popup_reg" class="popup">
		<a href="#" class="popup__area"></a>
		<div class="popup__body">
			<div class="popup__content">
				<a href="#" class="popup__close">x</a>
				<form action="vendor/register.php" method="post" enctype="multipart/form-data">

					<div class="popup-registration">
						<div class="popup__logo">
							HomeWork Helper
						</div>
						<div class="popup-registration__radio">
							<div class="form_radio_group">
								<div class="form_radio_group-item form_radio_group-item_1">
									<input id="radio-1" type="radio" name="role" value="student" checked>
									<label for="radio-1">Student</label>
								</div>
								<div class="form_radio_group-item">
									<input class="form_radio_group-item_2" id="radio-2" type="radio" name="role" value="doer">
									<label for="radio-2">Doer</label>
								</div>
								<div class="form_radio_group-item form_radio_group-item_3">
									<input id="radio-3" type="radio" name="role" value="expert">
									<label for="radio-3">Expert</label>
								</div>
							</div>
						</div>
						<input placeholder = "Create your login" type="text" name="login_reg" value="">
						<input class="hui" placeholder ="Your education" type="text" name="education" value="">
						<input placeholder = "Create your password" type="password" name="userpass_reg">
						<input placeholder = "Confirm your password" type="password" name="userpass_confirm">
						<?php
						if ($_SESSION['passUnconf']) {
							echo '<div class="passunconf">' . $_SESSION['passUnconf'] . '</div>';
						};
						unset($_SESSION['passUnconf']);
						?>
						<button class= "forjs" type = "submit">Register</button>
						<a href="#popup" class="">Have account? <span>Log in</span></a>
					</div>
				</form>

			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>




