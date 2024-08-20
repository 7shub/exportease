<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql1 = mysqli_query($conn, "SELECT unique_id FROM expoters WHERE unique_id = {$outgoing_id}");
    if(mysqli_num_rows($sql1) > 0)
    {
     $row = mysqli_fetch_assoc($sql1);
    }
    if($outgoing_id = $row)
    {
          $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");
          if(mysqli_num_rows($sql) > 0)
          {
               include "data.php";
          }
          else
          {
               $output .= "No user found related to your search term";
          }
     }
     else
     {
          $sql = mysqli_query($conn, "SELECT * FROM custom_broker WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'");
          if(mysqli_num_rows($sql) > 0)
          {
               include "data.php";
          }
          else
          {
               $output .= "No user found related to your search term";
          }
     }
   echo $output;
?>