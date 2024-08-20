<?php
session_start();
include_once "config.php";
$u_type = mysqli_real_escape_string($conn, $_POST['#']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($u_type) && !empty($email) && !empty($password))
{
    //let's check user type
    if($u_type == 'Expoter')
    {
        //let's check users entered email & password matched to database any table row email and password
        $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE email = '{$email}' AND password = '{$password}'");

        if(mysqli_num_rows($sql) > 0)
        {
            //if user found then
            $row = mysqli_fetch_assoc($sql);
            //if user is active then
            $status ="Active now";
            $sql2 = mysqli_query($conn, "UPDATE expoters SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2)
            {
            $_SESSION['unique_id'] = $row['unique_id'];
            //using this session we used user unique_id in other php file
            echo "success";
            }
        }
        else
        {
            echo "Email or Password is incorrect!";
        }
    }
    else
    {
        $sql = mysqli_query($conn, "SELECT * FROM custom_broker WHERE email = '{$email}' AND password = '{$password}'");

        if(mysqli_num_rows($sql) > 0)
        {
            //if user found then
            $row = mysqli_fetch_assoc($sql);
            //if user is active then
            $status ="Active now";
            $sql2 = mysqli_query($conn, "UPDATE custom_broker SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2)
            {
            $_SESSION['unique_id'] = $row['unique_id'];
            //using this session we used user unique_id in other php file
            echo "success";
            }
        }
        else
        {
            echo "Email or Password is incorrect!";
        }
    }
    
}
else
{
    echo "All inpute fields are required!";
}
?>