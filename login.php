<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>
<title>Login</title>
<link rel="stylesheet" href="css/login.css">
</head>
  <body>
    <img src="Images/Ship.jpg">
    <div class="wrapper">
      <section class="form login">
        <header>Login Here</header>
        <form action="#">
          <div class="error-txt"></div>
          <div class="type">
            <div class="Utype">
              <input type="radio" id="CB" name="#" value="Custom_Broker" />
              <label for="CB">Custom Broker</label>
            </div>
            <div class="Utype">
              <input type="radio" id="EX" name="#" value="Expoter" />
              <label for="EX">Expoter</label>
            </div>
          </div><br>
          <div class="field input">
            <label>Email Name</label>
            <input type="text" name="email" placeholder="Enter your email">
          </div>
          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="login">
          </div>
        </form>
        <div class="link">Not yet signed up? <a href="registration.php">Signup now</a></div>
      </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
  </body>
</html>