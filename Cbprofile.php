<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php include_once "header.php";?>
    <title>Custom Broker Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/CbProfile.css">
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
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-50" width="180px" src="php/images/<?php echo $row['img']?>">
                    <span class="font-weight-bold"><?php echo $row['fname'] . " " . $row['lname']?></span>
                    <span class="text-black"><?php echo $row['email']?></span>
                </div>
            </div>
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-right">CB Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First Name" value="<?php echo $row['fname']?>"></div>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="<?php echo $row['lname']?>" placeholder="Last Name"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" placeholder="Enter Phone Number" value="<?php echo $row['mob_no']?>"></div>
                        <div class="col-md-12"><label class="labels">Address</label><textarea class="form-control" placeholder="Address" value="<?php echo $row['address']?>"></textarea></div>
                        <div class="col-md-12"><label class="labels">Company Name</label><input type="text" class="form-control" placeholder="Company Name" value="<?php echo $row['company_name']?>"></div>
                        <div class="col-md-12"><label class="labels">Experience</label><input type="text" class="form-control" placeholder="Experience" value="<?php echo $row['experience']?>"></div>
                        <div class="col-md-12"><label class="labels">Previous Work</label><textarea class="form-control" value="<?php echo $row['services_provided']?>"placeholder=" Write Your Work"></textarea></div>
                        <div class="col-md-12"><label class="labels">Service you Provide</label><textarea class="form-control" value="<?php echo $row['previous_work']?>" placeholder="Write Your Service's"></textarea></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</body>

</html>