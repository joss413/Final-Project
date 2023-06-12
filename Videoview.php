<?php

include "connection.php";
// Get the image URL based on the ID from the button click
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve the image URL from the database
    $query = "SELECT video_url FROM complaint WHERE c_id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $videoURL = $row['video_url'];
        
        // Display the image
        echo '<img src="./'. $videoURL . '" alt="Video">';
    } else {
        echo 'Video not found.';
    }
} else {
    echo 'Invalid request.';
}


?>
