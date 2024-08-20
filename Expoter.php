<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>
<?php include_once "header.php"; ?>
<title>Expoter</title>
<link rel="stylesheet" href="css/Expoter.css">
</head>

<body>
    <img src="Images/Register01.jpg">
    <div class="wrapper">
        <section class="form signup">
            <header>Expoter</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="Division">
                    <div class="div1">
                        <div class="name-details">
                            <div class="field input">
                                <label>First Name</label>
                                <input type="text" name="fname" placeholder="First Name">
                            </div>
                            <div class="field input">
                                <label>last Name</label>
                                <input type="text" name="lname" placeholder="last Name">
                            </div>
                        </div>
                        <div class="field input">
                            <label>Mobile No.</label>
                            <input type="number" name="mob_no" placeholder="Mobile No.">
                        </div>
                        <div class="field input">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter new password">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>

                    <div class="div2">
                        <div class="field input">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="Company Name">
                        </div>
                        <div class="field input">
                            <label>Product Name</label>
                            <input type="text" name="product_name" placeholder="Product Name">
                        </div>
                        <div class="field input">
                            <label>Address</label>
                            <textarea name="address" placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="images">
                    <div class="image1">
                        <span>Select Image</span>
                    </div>
                    <div class="image2">
                        <input name="image" type="file">
                    </div>
                </div>
                <br>
                <div class="field button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div class="link">Already signed up? <a href="#">Login now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/Expoter.js"></script>
</body>

</html>