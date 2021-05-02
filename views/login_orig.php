<?php

if (!empty($_POST["click_to_login"])) {
    include_once './models/user.php';
    $user = new user();
    $login_response = $user->loginUser();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<link rel="stylesheet" type="text/css" href="./styles/main.css" />
	<link rel="stylesheet" type="text/css" href="./styles/register.css" />
	<link rel="stylesheet" type="text/css" href="../bs/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="./js/jquery/jquery-3.3.1.js"></script>
</head>
<body class="text-center">
	<div class="main-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="./views/register_user.php">Register</a>
			</div>
			<div class="signup-align">
				<form class="form-signin" name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading">Login Details</div>
				<?php if(!empty($login_response)){?>
				<div class="error-msg"><?php echo $login_response;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="username-info"></span>
							</div>
							<input class="form-control" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login_password_info"></span>
							</div>
							<input class="form-control" type="password"
								name="login_password" id="login_password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="click_to_login"
							id="click_to_login" value="Click to Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login_password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login_password_info").html("required.").css("color", "#ee0000").show();
		$("#login_password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</body>
</html>
