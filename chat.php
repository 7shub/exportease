<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
   header("location: login.php");
}
?> 

<?php include_once "header.php"; ?>
<title>Chat Interface</title>
<link rel="stylesheet" href="css/chat.css">
</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                include_once "php/config.php";
                //$user_id = parse_url()
                $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$user_id}");
                $sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $profil = 'Expoprofile.php';
                    $row = mysqli_fetch_assoc($sql);
                } else {
                    $profil = 'Cbprofile.php';
                    $row = mysqli_fetch_assoc($sql1);
                }
                //echo "<script>console.log('Debug Objects: " . $user_id . "' );</script>";
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" onclick="window.open('<?php echo $profil?>');" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" >
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" > 
                <input type="text" class="input-field" name="message" placeholder="Type a message here...">
                <button ><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
</body>
<script src="javascript/chat.js"></script>

</html>