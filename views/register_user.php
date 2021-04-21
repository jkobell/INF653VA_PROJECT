<?php

if (!empty($_POST["click_to_register"])) {	
    include_once '../models/user.php';
    $user = new user();
    $registration_response = $user->registerUser();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="../styles/main.css" />
<link rel="stylesheet" type="text/css" href="../styles/register.css" />
<script type="text/javascript" src="../js/jquery/jquery-3.3.1.js"></script>
</head>
<body>
	<div class="main-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="index.php">Login-->here</a>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Registration Details</div>
	<?php
    if (!empty($registration_response["status"])) {
    ?>
    <?php
        if ($registration_response["status"] == "error") {
    ?>
				    <div class="server-response error-msg"><?php echo $registration_response["message"]; ?></div>
    <?php
        } else if ($registration_response["status"] == "success") {
    ?>
                    <div class="server-response success-msg"><?php echo $registration_response["message"]; ?></div>
    <?php
        }
    ?>
	<?php
    }
    ?>
				<div class="error-msg" id="error-msg">
				</div>					
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="register_password_info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="register_password" id="register_password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="click_to_register"
							id="click_to_register" value="Click to Register">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function signupValidation() {
	var valid = true;
	
	$("#email").removeClass("error-field");
	$("#register_password").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");
	
	var email = $("#email").val();
	var Password = $('#register_password').val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	
	$("#email-info").html("").hide();
	
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#register_password_info").html("required.").css("color", "#ee0000").show();
		$("#register_password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
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
