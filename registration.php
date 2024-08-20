<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: home.php");
}
?>
<?php include_once "header.php"; ?>
<title>Register As</title>
<link rel="stylesheet" href="css/RB.css" />
</head>
  <body>
    <img src="Images/6210008.jpg" />
    <div class="container">
      <h1>Register As</h1>
      <form action="#">
      <div class="button">
        <div class="Expoter">
            <input type="button" value="Expoter">  
        </div>
        <div class="CB">
            <input type="button" value="Custom Broker">
        </div>
      </div>
      </form>
      <div class="link">Already have an Account? <a href="login.php">Login</a></div>
    </div>
    <script src="javascript/rb.js"></script>
  </body>
</html>
