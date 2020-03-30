<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login | Face Detection Game</title>
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/user.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
	<section class="wrapper login">

		<!-- Navbar -->
		<?php include_once("./navbar.php")?>

		<!-- Login form -->
		<form action="./php/login.inc.php" method="post" class="form login-form">
			<h1>Login</h1>

			<div class="txtb">
				<input type="text" name="e_mail">
				<span data-placeholder="Email"></span>
			</div>

			<div class="txtb">
				<input type="password" name="user_password">
				<span data-placeholder="Password"></span>
			</div>

			<button type="submit" class="submit-btn" value="Login" name="login-submit">Login</button>

			<div class="bottom-text">
				Don't have account? <a href="./sign_up.php">Sign up here</a>
			</div>

		</form>

	</section>

	<!-- Add effect on input -->
	<script type="text/javascript">
		$(".txtb input").on("focus", function () {
			$(this).addClass("focus");
		});

		$(".txtb input").on("blur", function () {
			if ($(this).val() == "")
				$(this).removeClass("focus");
		});
	</script>

	<?php include("global_script.php")?>

</body>

</html>