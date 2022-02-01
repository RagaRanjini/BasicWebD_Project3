<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Log-in/Register</title>
	<link rel="stylesheet" href="authenticationcss.css">
	<link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
	<div class="top">
		<img src="logo.png" alt="logo">
	</div>

	<div class="window">
		<div class="row" style="margin-top: 100px;margin-left: 400px;">
			<button class="col m-2 btn btn-primary" id="login_button" style=" max-width: 180px;">Sign in</button>
			<button class="col m-2 btn btn-primary" id="register_button" style=" max-width: 180px;">Sign up</button>
		</div>
		<div>
			<div id="login" class="ms-5 p-5">
				<?php include('login.php'); ?>
			</div>
			<div id="register" class="ms-5 p-5">
				<?php include('register.php'); ?>
			</div>
		</div>
	</div>
</div>
<script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="javascript.js"></script>
</body>
</html>