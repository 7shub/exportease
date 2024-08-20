<?php
    $conn=mysqli_connect("localhost","root","","export_ease");
    if(!$conn)
    {
        echo"Database Conneted" . mysqli_connect_error();
    }
?>