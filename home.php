<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php";?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/B1.ico" type="">
    <title> ExportEase </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
<?php
    include_once "php/config.php";
    $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$_SESSION['unique_id']}");
    $sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$_SESSION['unique_id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    } else {
        $row = mysqli_fetch_assoc($sql1);
    }   
?>
    <div class="hero_area">
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid ">
                    <div class="contact_nav">
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call : +91 99999 99999
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                Email : ExportEase123@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.html">
                            <span>
                                <img src="images/LOGOW.jpg">
                            </span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="home.html">Home <span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html"> About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="users.php"> chat</a>
                                </li>
                                <li class="nav-item">
                                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section class="slider_section ">
            <div class="slider_bg_box">
                <img src="images/Register01.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <div class="detail-box">
                                        <h1>
                                            We Provide best <br>
                                            Transport Service
                                        </h1>
                                        <p>
                                            Delivering excellence in transportation, we provide the best transport service, ensuring prompt and secure delivery of goods.
                                            With a commitment to reliability and customer satisfaction,we offer tailored solutions to meet your needs, backed by our
                                            extensive experience and dedication to quality.
                                        </p>
                                        <div class="btn-box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <div class="detail-box">
                                        <h1>
                                            We Provide best <br>
                                            Transport Service
                                        </h1>
                                        <p>
                                            Delivering excellence in transportation, we provide the best transport service, ensuring prompt and secure delivery of goods.
                                            With a commitment to reliability and customer satisfaction,we offer tailored solutions to meet your needs, backed by our
                                            extensive experience and dedication to quality.
                                        </p>
                                        <div class="btn-box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <div class="detail-box">
                                        <h1>
                                            We Provide best <br>
                                            Transport Service
                                        </h1>
                                        <p>
                                            Delivering excellence in transportation, we provide the best transport service, ensuring prompt and secure delivery of goods.
                                            With a commitment to reliability and customer satisfaction,we offer tailored solutions to meet your needs, backed by our
                                            extensive experience and dedication to quality.
                                        </p>
                                        <div class="btn-box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </section>
    </div>
    <br><br><br>
    <section class="about_section layout_padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About <span>Us</span>
                            </h2>
                        </div>
                        <p>
                            At ExportEase, we specialize in providing efficient and reliable cargo
                            transport solutions tailored to meet the diverse needs of our clients.we have established ourselves as leaders in delivering goods safely and on time,
                            leveraging a robust network of transportation modes including ships.Trust ExportEase for all your cargo transport needs, and experience the difference in quality and reliability.
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="images/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="track_section layout_padding">
        <div class="track_bg_box">
            <img src="images/track-bg.jpg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_container">
                        <h2>
                            Our Service
                        </h2>
                    </div>
                    <p>
                        "Cargo transport" refers to the movement of goods from one location to another.It's crucial for global trade and commerce,
                        facilitating the exchange of goods between producers and consumers worldwide.The efficiency and reliability of cargo transport networks play a significant role in the economy,
                        affecting supply chains, prices, and market accessibility.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 info_col">
                    <div class="info_contact">
                        <h4>
                            Address
                        </h4>
                        <div class="contact_link_box">

                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +91 99999 99999
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    ExportEase123@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="info_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info_col">
                    <div class="info_detail">
                        <h4>
                            Info
                        </h4>
                        <p>
                            Delivering excellence in transportation, we provide the best transport service, ensuring prompt and secure delivery of goods. With a commitment to reliability and customer satisfaction, we offer tailored solutions
                            to meet your needs, backed by our extensive experience and dedication to quality.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mx-auto info_col">
                    <div class="info_link_box">
                        <h4>
                            Links
                        </h4>
                        <div class="info_links">
                            <a class="active" href="home.html">
                                <img src="images/nav-bullet.png" alt="">
                                Home
                            </a>
                            <a class="" href="about.html">
                                <img src="images/nav-bullet.png" alt="">
                                About
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info_col ">
                    <h4>
                        Prepared By:-
                    </h4>
                    <span>Shubham Sumant-D23CS105</span><br>
                    <span>Kathan Mehta-D23CS107</span><br>
                    <span>Tanay Mahale-D23CS108</span>
                </div>
            </div>
        </div>
    </section>
    <section class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="home.html">ExportEase</a>
            </p>
        </div>
    </section>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>