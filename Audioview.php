<?php

include "connection.php";
// Get the image URL based on the ID from the button click
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve the image URL from the database
    $query = "SELECT audio_url FROM complaint WHERE c_id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $audioURL = $row['audio_url'];
        // echo $audioURL;
        // Display the image
        echo '<audio controls>
        <source src="./'. $audioURL . '" type="audio/wav">
        Your browser does not support the audio element.
        </audio>';

        
        // '<img src="./'. $audioURL . '" alt="Audio">';
    } 
    else {
        echo 'audio not found.';
    }
} else {
    echo 'Invalid request.';
}


?>
