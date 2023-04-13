<meta http-equiv="refresh"  content="60;url=Takerlogin.php";


<!DOCTYPE html>
<html>
<head>
<style>

.table{
    border-collapse: collapse;
    margin: 25px 0px;
    font-size: 0.9em;
    min-width: 400px;
    /* border:black 2px solid; */
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0 , 0 ,0 ,0.15);
}

.table thead tr{
    background-color: #000;
    color:white;
    font-weight: bold;
}

.table th,.table td{
    padding: 12px 15px;
}

.table tbody tr {

    border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-of-type(even){
   background-color: #f3f3f3;
}

.table tbody tr:last-of-type{
    border-bottom: 3px solid #000;
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
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="Takerlogin.php">Taker Login</a></li>
        <li class="active"><a href="TakerHome.php">Taker Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="active" ><a href="TakerHome.php">View Complaints</a></li>
        <li ><a href="TakerHistory.php">Taker History</a></li>
        <li><a href="Taker_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

    <form style="margin-top: 7%; margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-primary" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%;"> </br> </br>
        </div>
    </form>
    
    
    

 



<?php
  include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Takerlogin.php");
  // Fetch all the complaints from the database
  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description, inc_status, p_id FROM complaint";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {
      // Start the table and output the header row
      echo "<table  class='table';>";
      echo "<thead>";
      echo "<tr>
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th>Descripition</th>
      <th>Complaint Status</th>
      <th>Police ID</th>
      <th>Accept </th>
      <th>Reject</th>
      </tr>";
      echo"</thead>";
     echo"<tbody>";
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
                        <button type='submit' name='pass_to_handler' class='btn btn-primary' onclick='hideRow(".$row["c_id"].")'>Pass to Handler</button>
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
                    <button type='submit' name='reject_complaint' class='btn btn-danger' onclick='confirmReject(".$row["c_id"].")'>Confirm Rejection</button>
                   </form> 
                       
                   
                
            
            </td>

            
        </tr>";
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
  
  // check if the row already exists in the p_handler table
  $sql = "SELECT * FROM p_handler WHERE c_id = '$c_id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // the row already exists, update the values
      $sql = "UPDATE p_handler SET id_no='$id_no', type_crime='$type_crime', d_o_c='$d_o_c', repo_time_and_date='$repo_time_and_date', location='$location', description='$description', inc_status='$inc_status', p_id='$p_id' WHERE c_id='$c_id'";
      if ($conn->query($sql) === TRUE) {
          // remove the row from the table
          // add your code to remove the row here
      } else {
          echo "Error updating record: " . $conn->error;
      }
  } else {
      // the row does not exist, insert the values as a new row
      $sql = "INSERT INTO p_handler (c_id, id_no, type_crime, d_o_c, repo_time_and_date, location, description, inc_status, p_id)
      VALUES ('$c_id', '$id_no', '$type_crime', '$d_o_c', '$repo_time_and_date', '$location', '$description', '$inc_status', '$p_id')";
      if ($conn->query($sql) === TRUE) {
          // remove the row from the table
          // add your code to remove the row here
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
   
   // check if the row already exists in the p_handler table
   $sql = "SELECT * FROM del_taker WHERE c_id = '$c_id'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       // the row already exists, update the values
       $sql = "UPDATE del_taker SET id_no='$id_no', type_crime='$type_crime', d_o_c='$d_o_c', repo_time_and_date='$repo_time_and_date', location='$location', description='$description', inc_status='$inc_status', p_id='$p_id' WHERE c_id='$c_id'";
       if ($conn->query($sql) === TRUE) {
           // remove the row from the table
           // add your code to remove the row here
       } else {
           echo "Error updating record: " . $conn->error;
       }
   } else {
       // the row does not exist, insert the values as a new row
       $sql = "INSERT INTO del_taker (c_id, id_no, type_crime, d_o_c, repo_time_and_date, location, description, inc_status, p_id)
       VALUES ('$c_id', '$id_no', '$type_crime', '$d_o_c', '$repo_time_and_date', '$location', '$description', '$inc_status', '$p_id')";
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
 


// close the database connection
  mysqli_close($conn);
  ?>
	<title>Taker Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
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

<br> <br> <br>

<div style="position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   height:25px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b> on_the_go incident reporter | All Right Reserved</b></h4>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>