<?php include_once "header.php"; ?>
<title>Custom Broker</title>
<link rel="stylesheet" href="css/CB.css">
</head>

<body>
    <img src="Images/cb.jpg">
    <div class="wrapper">
        <section class="form signup">
            <header>Custom Broker</header>
            <form action="#">
                <div class="Division">
                    <div class="error-txt">this is an error message!</div>
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
                        <div class="field input">
                            <label>Company Name</label>
                            <input type="text" name="company_name" placeholder="Company Name">
                        </div>              
                        <div class="field input">
                            <label>Your Experience</label>
                            <input type="number" name="experience" placeholder="Experience in Number">
                        </div>
                    </div>

                    <div class="div2">
                        <div class="field input">
                            <label>Service's You Provide</label>
                            <textarea name="services_provided" placeholder="Write Your Service You Provide"></textarea>
                        </div>
                        <div class="field input">
                            <label>Your Previous Work</label>
                            <textarea name="previous_work" placeholder="Write Your Previous Work"></textarea>
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
    <script src="javascript/CB.js"></script>
</body>

</html>