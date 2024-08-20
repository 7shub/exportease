<?php
    session_start();
    include_once "config.php";
    $currentUserId = $_SESSION['unique_id'];
    $sql3 = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$currentUserId}");
    $sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$currentUserId}");
    $output = "";
    if(mysqli_num_rows($sql3) > 0)
    {
        $sql = mysqli_query($conn, "SELECT * FROM custom_broker");
        
        if(mysqli_num_rows($sql) == 0)
        {
            $output .= "No users are available to chat";
        }
        elseif(mysqli_num_rows($sql)>0)
        {
            include "data.php";
        }
    }
    else
    {
        $sql = mysqli_query($conn, "SELECT * FROM expoters");
        
        if(mysqli_num_rows($sql) == 0)
        {
            $output .= "No users are available to chat";
        }
        elseif(mysqli_num_rows($sql)>0)
        {
            include "data.php";
        }
    }
    echo $output;
?>