<?php
    session_start();
    if(isset($_SESSION['unique_id']))
    {
        //if user is logged in then come to this page otherwise go to login page
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$logout_id}");
        $sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$logout_id}");
        if(mysqli_num_rows($sql) > 0)
        {
            if(isset($logout_id))
            {
                $status = "Offline now";
                //once user logout we'll update this status to offline and in the login
                // we'll again update status to active now if user logged in 
                $sql2 = mysqli_query($conn, "UPDATE expoters SET status = '{$status}' WHERE unique_id = {$logout_id}");
                if($sql2)
                {
                    session_unset();
                    session_destroy();
                    header("location: ../login.php");
                }

            }
        }
        else
        {
            if(isset($logout_id))
            {
                $status = "Offline now";
                //once user logout we'll update this status to offline and in the login
                // we'll again update status to active now if user logged in 
                $sql2 = mysqli_query($conn, "UPDATE custom_broker SET status = '{$status}' WHERE unique_id = {$logout_id}");
                if($sql2)
                {
                    session_unset();
                    session_destroy();
                    header("location: ../login.php");
                }

            }
        }
        
    }
    else
    {
        header("location: ../login.php");
    }
?>