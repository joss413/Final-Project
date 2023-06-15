
<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'taker') {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title> Taker History </title>

  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/TakerHistory.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
</head>
<body>
  
 <header>

     <div class="leftside">
         <a href="home.php"> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
              
                <nav class="navleft">
                  <a href="home.php"> Home </a>
                  <a href="Takerlogin.php">Taker Login</a></li>
              </nav>
      </div>

         <nav class="navigation">
            <a href="TakerHistory.php" class="active">Taker History</a>
            <a href="TakerHome.php">View Complaints</a>
            <a href="Taker_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        
       
         </nav>   
</header>





<?php
include("connection.php");
    // // session_start();
    if(!isset($_SESSION['x']))
        header("location:Takerlogin.php");
    
  
  // Fetch all the complaints from the database
  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description,image_url,audio_url,video_url, inc_status, p_id FROM p_handler";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {

      // Output the table name
      echo "<h2 class='title'> Cases passed to Handler </h2>";


      // Start the table and output the header row
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>;
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th> Descripition </th>
      <th> Image </th>
      <th> Audio </th>
      <th> Video </th>
      <th>Complaint Status</th>
      <th>Police ID</th></tr>";
      echo "</thead>";
      echo "<tbody>";
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr  id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td><a style='color:black;'href='Imageview.php?id=".$row["c_id"]."'>View Image</a></td>
            <td><a style='color:black;'href='Audioview.php?id=".$row["c_id"]."'>View Audio</a></td>
            <td><a style='color:black;'href='Videoview.php?id=".$row["c_id"]."'>View Video</a></td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
        
        </tr>";
    }
    echo "</tbody>";
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }


echo " ";
echo "\n ";

  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description,image_url,audio_url,video_url, inc_status, p_id FROM del_taker";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {

      // Output the table name
      echo "<h2 class='title'>Cases Dropped By Taker</h2>";


      // Start the table and output the header row
      echo "<table class='table'>";
      echo "<thead>";
      echo "<tr>;
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th> Description </th>
      <th> Image </th>
      <th> Audio </th>
      <th> Video </th>
      <th>Complaint Status</th>
      <th>Police ID</th></tr>";
      echo "</thead>";
      echo "<tbody>";
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr  id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td><a style='color:black;'href='Imageview.php?id=".$row["c_id"]."'>View Image</a></td>
            <td><a style='color:black;'href='Audioview.php?id=".$row["c_id"]."'>View Audio</a></td>
            <td><a style='color:black;'href='Videoview.php?id=".$row["c_id"]."'>View Video</a></td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
           
        </tr>";
    }
    echo "</tbody>";
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }




// close the database connection
  mysqli_close($conn);
  ?>

 

  <?php
   include("footers.php");
  ?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>