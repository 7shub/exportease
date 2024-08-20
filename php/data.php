<?php
//session_start();
//include_once "config.php";
//$outgoing_id = $_SESSION['unique_id'];
//$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
while ($row = mysqli_fetch_assoc($sql)) 
{
    
    $sql2 = "SELECT * FROM messages 
            WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']})
             AND (outgoing_msg_id = {$currentUserId} OR incoming_msg_id = {$currentUserId})
             ORDER BY msg_id DESC";
    /*$sql2 = "SELECT * FROM messages 
             WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']})
             ORDER BY msg_id DESC";*/
    $query2 = mysqli_query($conn, $sql2);
    if (!$query2) {
        die(mysqli_error($conn));
    }
    if ( $query2 && mysqli_num_rows($query2) > 0) {
        $row2 = mysqli_fetch_assoc($query2);

        // Handle null values gracefully
        $msg = ($row2['msg']) ? $row2['msg'] : "No message available";

        // Trimming message if words are more than 28
        $msg = (strlen($msg) > 28) ? substr($msg, 0, 28) . '...' : $msg;

        // Adding "You: " text before msg if login id sent msg
        $you = ($currentUserId == $row2['outgoing_msg_id']) ? "You: " : "";

        // Check if user is online or offline
        $offline = ($row['status'] == "Offline now") ? "offline" : "";

        $user_id = $row['unique_id'];
        //$sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$user_id}");
        //$sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$user_id}");
        //if (mysqli_num_rows($sql) > 0) {
        //    $profil = 'Expoprofile';
         //   $row = mysqli_fetch_assoc($sql);
        //} else {
         //   $profil = 'Cbprofile';
          //  $row = mysqli_fetch_assoc($sql1);
        //}
        $output = "<a href='chat.php?id=$user_id'>
                        <div class='content'>
                            <img src='php/images/{$row['img']}' alt=''>
                            <div class='details'>
                                <span>{$row['fname']} {$row['lname']}</span>
                                <p>{$you}{$msg}</p>
                            </div>
                        </div>
                        <div class='status-dot $offline'><i class='fas fa-circle'></i></div>
                    </a>";


    } 
    else
    {
        // Handle no message found or query error
        $msg = "No message available";
        $offline = ($row['status'] == "Offline now") ? "offline" : "";
        $user_id = $row['unique_id'];
        //$sql = mysqli_query($conn, "SELECT * FROM expoters WHERE unique_id = {$user_id}");
        //$sql1 = mysqli_query($conn, "SELECT * FROM custom_broker WHERE unique_id = {$user_id}");
        //if (mysqli_num_rows($sql) > 0) {
        //    $profil = 'Expoprofile';
        //    $row = mysqli_fetch_assoc($sql);
        //} else {
        //    $profil = 'Cbprofile';
        //    $row = mysqli_fetch_assoc($sql1);
        //}
        $output = "<a href='chat.php?id=$user_id'>
                        <div class='content'>
                            <img src='php/images/{$row['img']}'height='40px'; width: '40px'; alt=''>
                            <div class='details'>
                                <span>{$row['fname']} {$row['lname']}</span>
                                <p>{$msg}</p>
                            </div>
                        </div>
                        <div class='status-dot $offline'><i class='fas fa-circle'></i></div>
                    </a>";
        // Other handling logic as needed
    }
    // Output or store $output as needed
}

?>
