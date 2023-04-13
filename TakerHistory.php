<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #000;
}

th{
  background-color: black; 
  color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.space {
    margin-bottom: 16px;
}
.button-col {
    width: 25%;
}

.button-col button {
    display: block;
    margin: 0 auto;
    width: 80%;
}

table tr.hidden-row {
  display: none;
}

table tr.invisible-row {
  display: none;
}

mark {
  background-color:white;
  color:#3b3b3b;
}
</style>
</head>
<body style="background-color: #dfdfdf">
 <nav  class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b> On_The_Go Incident Reporter </b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="TakerHome.php">View Complaints</a></li>
        <li class="active" ><a href="TakerHistory.php">Taker History</a></li>
        <li><a href="Taker_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
<br><br><br><br><br><br><br>





<?php
include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Takerlogin.php");
    
  
  // Fetch all the complaints from the database
  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description, inc_status, p_id FROM p_handler";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {

      // Output the table name
      echo "<h4 style='text-align:center; font-weight:bold;'><mark>Cases passed to Handler</mark></h4>";


      // Start the table and output the header row
      echo "<table >";
      echo "<tr>
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th> Descripition </th>
      <th>Complaint Status</th>
      <th>Police ID</th></tr>";
  
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='complaint-row' id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
           
        </tr>";
    }
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }


echo " ";
echo "\n ";

  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description, inc_status, p_id FROM del_taker";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {

      // Output the table name
      echo "<h4 style='text-align:center; font-weight:bold;'><mark>Cases Dropped By Taker</mark></h4>";


      // Start the table and output the header row
      echo "<table >";
      echo "<tr>
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th> Descripition </th>
      <th>Complaint Status</th>
      <th>Police ID</th></tr>";
  
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='complaint-row' id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
           
        </tr>";
    }
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }




// close the database connection
  mysqli_close($conn);
  ?>
	<title>Taker History</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
 

  <?php
  include("footer.php");
  ?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>