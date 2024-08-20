<?php
session_start();
include_once "config.php"; // Include database connection

if (isset($_SESSION['unique_id'])) {
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$_SESSION['unique_id']}");
    $sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
            $table = 'expoters';
        } else {
            $table = 'custom_broker';
        }
    $output = "";
    $sql = "SELECT * FROM messages 
            LEFT JOIN $table ON $table.unique_id = messages.incoming_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})
            ORDER BY msg_id "; // Corrected SQL query

    $query = mysqli_query($conn, $sql);
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                if ($row['outgoing_msg_id'] == $outgoing_id) {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/'. $row['img'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
        } else {
            $output = "No messages found.";
        }
        echo $output;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../login.php"); // Corrected header redirect syntax
    exit(); // Add exit after header redirect
}
?>
