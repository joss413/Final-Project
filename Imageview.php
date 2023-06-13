<?php

include "connection.php";
// Get the image URL based on the ID from the button click
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve the image URL from the database
    $query = "SELECT image_url FROM complaint WHERE c_id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageURL = $row['image_url'];
        
        // Display the image
        echo '<img src="./'. $imageURL . '" alt="Image">';
    } else {
        echo 'Image not found.';
    }
} else {
    echo 'Invalid request.';
}


?>
