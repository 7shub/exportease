<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php";?>
<link rel="stylesheet" href="css/user.css">
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
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
                <div class="content">
                    <img src="php/images/<?php echo $row['img']?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="home.php?>" class="logout">Home</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
               
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>
