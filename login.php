
<!DOCTYPE html>
<html lang="en">

<?php include_once("./head.php")?>

<body>

    <?php include_once("./navbar.php")?>

    <form action="./php/login.inc.php" method="post" class="login-form">
    <h1>Login</h1>

    <div class="txtb">
      <input type="text" name="e_mail">
      <span data-placeholder="Email"></span>
    </div>

    <div class="txtb">
      <input type="password" name="user_password">
      <span data-placeholder="Password"></span>
    </div>

    <button type="submit" class="logbtn" value="Login" name="login-submit"></button>

    <div class="bottom-text">
      Don't have account? <a href="./sign_up.php">Sign up here</a>
    </div>

  </form>
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