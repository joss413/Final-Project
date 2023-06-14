<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'taker') {
    header("Location: home.php");
    exit();
}
?>




<meta http-equiv="refresh"  content="60;url=Takerlogin.php";


<!DOCTYPE html>
<html>
<head>

  <title>Taker Homepage</title>
	
  <link rel="stylesheet" type="text/css" href="./Assets/css/Takerhome.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	

</head>
<body>


 <header>

     <div class="leftside">
         <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
              
                <nav class="navleft">
                  <a href="home.php"> Home </a>
                  <a href="Takerlogin.php">Taker Login</a>
              </nav>
      </div>

         <nav class="navigation">
            
            <a href="Takerlogin.php" class="active"> Taker Home </a>
            <a href="TakerHistory.php">Taker History</a>
            <a href="Taker_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        
       
         </nav>   
</header>


    <form class="forms" method="post">
      <input type="text" name="cid" class="txts" placeholder="&nbsp Complaint ID" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btns" type="submit" value="Search" name="s2"> 
        </div>
    </form>

  
    
    

 



<?php
  include("connection.php");
    // session_start();
    if(!isset($_SESSION['x']))
        header("location:Takerlogin.php");
  // Fetch all the complaints from the database
  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description, inc_status, p_id,image_url,audio_url,video_url,Active FROM complaint";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {
      // Start the table and output the header row
      echo "<table  class='table'>";
      echo "<thead>";
      echo "<tr>
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th> Descripition </th>
      <th>Complaint Status</th>
      <th>Police ID</th>
      <th>Image</th>
      <th>Audio</th>
      <th>Video</th>
      <th>Accept </th>
      <th>Reject</th>
      </tr>";
      echo"</thead>";
     echo"<tbody>";
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {

        if( $row['Active']== null){
        echo "<tr  id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
            <td><a style='color:black;'href='Imageview.php?id=".$row["c_id"]."'>View Image</a></td>
            <td><a style='color:black;'href='Audioview.php?id=".$row["c_id"]."'>View Audio</a></td>
            <td><a style='color:black;'href='Videoview.php?id=".$row["c_id"]."'>View Video</a></td>
            
        
            
            <td>
                
                    <form method='post'>
                        <input type='hidden' name='c_id' value='" . $row["c_id"] . "'>
                        <input type='hidden' name='id_no' value='" . $row["id_no"] . "'>
                        <input type='hidden' name='type_crime' value='" . $row["type_crime"] . "'>
                        <input type='hidden' name='d_o_c' value='" . $row["d_o_c"] . "'>
                        <input type='hidden' name='repo_time_and_date' value='" . $row["repo_time_and_date"] . "'>
                        <input type='hidden' name='location' value='" . $row["location"] . "'>
                        <input type='hidden' name='description' value='" . $row["description"] . "'>
                        <input type='hidden' name='inc_status' value='" . $row["inc_status"] . "'>
                        <input type='hidden' name='p_id' value='" . $row["p_id"] . "'>
                        <input type='hidden' name='image_url' value='" . $row["image_url"] . "'>
                        <input type='hidden' name='audio_url' value='" . $row["audio_url"] . "'>
                        <input type='hidden' name='video_url' value='" . $row["video_url"] . "'>
                        <button type='submit' name='pass_to_handler' class='btn-primary' onclick='hideRow(".$row["c_id"].")'>Pass to Handler</button>
                    </form>
        </td>
        <td>
                    <form method='post'>
                    <input type='hidden' name='c_id' value='" . $row["c_id"] . "'>
                    <input type='hidden' name='id_no' value='" . $row["id_no"] . "'>
                    <input type='hidden' name='type_crime' value='" . $row["type_crime"] . "'>
                    <input type='hidden' name='d_o_c' value='" . $row["d_o_c"] . "'>
                    <input type='hidden' name='repo_time_and_date' value='" . $row["repo_time_and_date"] . "'>
                    <input type='hidden' name='location' value='" . $row["location"] . "'>
                    <input type='hidden' name='description' value='" . $row["description"] . "'>
                    <input type='hidden' name='inc_status' value='" . $row["inc_status"] . "'>
                    <input type='hidden' name='p_id' value='" . $row["p_id"] . "'>
                    <input type='hidden' name='image_url' value='" . $row["image_url"] . "'>
                    <input type='hidden' name='audio_url' value='" . $row["audio_url"] . "'>
                    <input type='hidden' name='video_url' value='" . $row["video_url"] . "'>
                    <button type='submit' name='reject_complaint' class='btn-danger' onclick='confirmReject(".$row["c_id"].")'>Confirm Rejection</button>
                   </form> 
                       
                   
                
            
            </td>

            
        </tr>";
        }
        
    }
    echo "</tbody>";
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }

// check if the pass to handler button was clicked
if(isset($_POST['pass_to_handler'])) {
  // retrieve the data from the row
  $c_id = $_POST['c_id'];
  $id_no = $_POST['id_no'];
  $type_crime = $_POST['type_crime'];
  $d_o_c = $_POST['d_o_c'];
  $repo_time_and_date = $_POST['repo_time_and_date'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  $inc_status = $_POST['inc_status'];
  $p_id = $_POST['p_id'];
  $img= $_POST['image_url'];
  $audio= $_POST['audio_url'];
  $video= $_POST['video_url'];

  $sql = "UPDATE complaint SET Active='active' where c_id = '$c_id'";
  $result = $conn->query($sql);
  if($result){
  
  // check if the row already exists in the p_handler table
  $sql = "SELECT * FROM p_handler WHERE c_id = '$c_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // the row already exists, update the values
      $sql = "UPDATE p_handler SET id_no='$id_no', type_crime='$type_crime', d_o_c='$d_o_c', repo_time_and_date='$repo_time_and_date', location='$location', description='$description', inc_status='$inc_status', p_id='$p_id' ,image_url='$img', audio_url='$audio',video_url='$video', WHERE c_id='$c_id'";
      if ($conn->query($sql) === TRUE) {
          // remove the row from the table
          // add your code to remove the row here
      } else {
          echo "Error updating record: " . $conn->error;
      }
  } else {
      // the row does not exist, insert the values as a new row
      $sql = "INSERT INTO p_handler (c_id, id_no, type_crime, d_o_c, repo_time_and_date, location, description, inc_status, p_id,image_url,audio_url,Video_url)
      VALUES ('$c_id', '$id_no', '$type_crime', '$d_o_c', '$repo_time_and_date', '$location', '$description', '$inc_status', '$p_id','$img','$audio','$video')";
      if ($conn->query($sql) === TRUE) {
          // remove the row from the table
          // add your code to remove the row here
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
}
}






if (isset($_POST['reject_complaint'])) {
   // retrieve the data from the row
   $c_id = $_POST['c_id'];
   $id_no = $_POST['id_no'];
   $type_crime = $_POST['type_crime'];
   $d_o_c = $_POST['d_o_c'];
   $repo_time_and_date = $_POST['repo_time_and_date'];
   $location = $_POST['location'];
   $description = $_POST['description'];
   $inc_status = $_POST['inc_status'];
   $p_id = $_POST['p_id'];
   $img= $_POST['image_url'];
   $audio= $_POST['audio_url'];
   $video= $_POST['video_url'];
  $sql = "UPDATE complaint SET Active='active' where c_id = '$c_id'";
  $result = $conn->query($sql);
  if($result){
  
   // check if the row already exists in the p_handler table
   $sql = "SELECT * FROM del_taker WHERE c_id = '$c_id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       // the row already exists, update the values
       $sql = "UPDATE del_taker SET id_no='$id_no', type_crime='$type_crime', d_o_c='$d_o_c', repo_time_and_date='$repo_time_and_date', location='$location', description='$description', inc_status='$inc_status', p_id='$p_id' ,image_url='$img',audio_url='$audio',video_url='$video' WHERE c_id='$c_id'";
       if ($conn->query($sql) === TRUE) {
           // remove the row from the table
           // add your code to remove the row here
       } else {
           echo "Error updating record: " . $conn->error;
       }
   } else {
       // the row does not exist, insert the values as a new row
       $sql = "INSERT INTO del_taker (c_id, id_no, type_crime, d_o_c, repo_time_and_date, location, description, inc_status, p_id,image_url,audio_url,video_url)
       VALUES ('$c_id', '$id_no', '$type_crime', '$d_o_c', '$repo_time_and_date', '$location', '$description', '$inc_status', '$p_id','$img','$audio','$video')";
       if ($conn->query($sql) === TRUE) {
           // remove the row from the table
           // add your code to remove the row here
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
   }

    // modify the complaint table
    $sql = "SELECT * FROM del_taker WHERE c_id = '$c_id'";
    $result = $conn->query($sql);
    $sql = mysqli_query($conn,"UPDATE del_taker SET inc_status='Unfulfilled Info',p_id='Not Assigned'");
  }
 }
 


// close the database connection
  mysqli_close($conn);
  ?>
	
    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
     if(sta2!="" && x2>=0)
     {
        document.getElementById("ciid").value="";
        alert("Blank Field not Allowed");
      }      
       
}
function hideRow(complaintId) {
  // get the table row that contains the button
  var row = document.getElementById("complaint-"+complaintId);
  // add the 'hidden-row' class to the row
  row.classList.add('invisible-row');
}


function confirmReject(complaintId) {
 var confirmed = confirm("Are you sure you want to reject this complaint?");
 if (!confirmed) {
  return false;
   }
  
    //hide the table row that contains the button
    var row = document.getElementById("complaint-"+complaintId);
    row.classList.add('hidden-row');
   return true;

 


}
</script>

<?php
  include("footer.php");
  ?>


 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>