<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $mob_no = mysqli_real_escape_string($conn, $_POST['mob_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
 
    if(!empty($fname) && !empty($lname) && !empty($mob_no) && !empty($email) && !empty($password) && !empty($company_name) && !empty($product_name) && !empty($address))
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            //if email is vallid
            //let's check that email already exist in the database
            $sql = mysqli_query($conn, "SELECT email FROM expoters WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0)
            {//if email already exist 
                echo "$email - This email already exist!";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    //if file is uploaded
                    $img_name = $_FILES['image']['name'];//getting user uploaded img name
                    //$img_type = $_FILES['image']['type'];//getting user uploaded img type
                    $tmp_name = $_FILES['image']['tmp_name'];//this temporary name is used to save/move file in our folder

                    //let's explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);//here we get the extension of an user uploaded img file
                   
                    $extensions = ['png', 'jpeg', 'jpg','JPG','JPEG','PNG'];//these are some valid img ext and we have store them in array
                    if(in_array($img_ext,$extensions) === true)
                    {
                        $time = time();//this will return us the current time
                                       //we need this time because when you uploading user img to in our folder we rename user file with current time
                                       //so all the img file will have a unique name
                        //let's move the user uploaded img to our particular folder
                        $new_img_name = $time.$img_name;
                       
                        if( move_uploaded_file($tmp_name,"images/".$new_img_name))
                        {
                            $status = "Active now";//once user signed up then his status will be active now
                            $random_id = rand(time(), 10000000);//creating random id for user
                            //let's insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO expoters (unique_id, fname, lname, mob_no, email, password, company_name, product_name, address, img, status)
                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$mob_no}', '{$email}', '{$password}', '{$company_name}', '{$product_name}', '{$address}', '{$new_img_name}', '{$status}')");
                            if($sql2)
                            {
                                $sql3 = mysqli_query($conn, "SELECT * FROM expoters WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0)
                                {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];//using this session we used user unique_id in other php file
                                    header("success");
                                    echo "success";
                                }
                            }
                            else
                            {
                                echo "Something went wrong!";
                            }
                        }
                    }
                    else
                    {
                        echo "please select an image file- png, jpeg or jpg";
                    }
                }
                else
                {
                    echo "Please select an Image file!";
                }
            }
        }
        else
        {
            echo "$email - This is not a valid email!";
        }
    }
    else
    {
        echo "All input field are required!";

    }
?>