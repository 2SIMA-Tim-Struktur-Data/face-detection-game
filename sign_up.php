<?php session_start ()?>
<!DOCTYPE html>
<html lang="en">

<?php include_once("./head.php")?>

<body>

    <?php include_once("./navbar.php")?>

    <form action="./php/sign_up.inc.php" method="post" class="login-form">
    <h1>Sign Up</h1>
    <p style="opacity: 0.5;">Please fill in this form to create an account!</p>

    <div class="txtb">
      <input type="text" name="username">
      <span data-placeholder="Username..."></span>
    </div>

    <div class="txtb">
      <input type="text" name="e_mail">
      <span data-placeholder="E-mail..."></span>
    </div>

    <div class="txtb">
      <input type="password" name="user_password">
      <span data-placeholder="Password..."></span>
    </div>

    <div class="txtb">
      <input type="password" name="confirm_password">
      <span data-placeholder="Confirm Your Password..."></span>
    </div>

    <button type="submit" name="signup-submit" class="logbtn">Sign Up</button>

    <div class="bottom-text">
      Already have an account? <a href="#">Log In</a>
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