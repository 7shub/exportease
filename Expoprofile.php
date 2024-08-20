<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
}
?>
<?php 
    include_once "header.php";
    include_once "config.php";
?>
        <title>Expoter Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/Expoprofile.css">
    </head>
    <body>
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            } 
        ?>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-50" width="180px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold"><?php echo $row['fname'] . " " . $row['lname']?></span>
                        <span class="text-black"><?php echo $row['email']?></span>
                    </div>
                </div>
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h4 class="text-right">Expoter Profile</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="First Name"  value="<?php echo $row['fname']?>"></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control"  value="<?php echo $row['lname']?>" placeholder="Last Name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" placeholder="Enter Phone Number"  value="<?php echo $row['mob_no']?>"></div>
                            <div class="col-md-12"><label class="labels">Address</label><textarea class="form-control" value="<?php echo $row['address']?>" placeholder="Address"></textarea></div>
                            <div class="col-md-12"><label class="labels">Company Name</label><input type="text" class="form-control" placeholder="Company Name"  value="<?php echo $row['company_name']?>"></div>
                            <div class="col-md-12"><label class="labels">Product Name</label><input type="text" class="form-control" placeholder="Product Name" value="<?php echo $row['product_name']?>"></div>
                        
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
        </div>
    </body>
</html>