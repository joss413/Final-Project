<meta http-equiv="refresh" content="60; url=Adminlogin.php">

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


	<title>Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    
     
</head>
<body style="background-image: url(search1.jpeg); ">
	<nav  class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>On_The_Go Incident Reporter</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="Adminlogin.php">Admin Login</a></li>
        <li class="active"><a href="AdminHome.php">Admin Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active" ><a href="AdminHome.php"> View users </a></li>
        <li ><a href="Admin_viewTaker.php">View Taker</a></li>
        <li ><a href="Admin_viewHandler.php">View Handler</a></li>
        <li ><a href="Admin_viewpolice.php">View Sub_Police</a></li>
        <li><a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
</br></br></br></br></br></br></br></br>

<?php
  include("connection.php");
session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
    
  
    
    // Fetch all the complaints from the database
$sql = "SELECT id_no,u_name,sub,woreda,gen,mob FROM user ";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if there are any complaints in the database
if (mysqli_num_rows($result) > 0) {
    // Start the table and output the header row
    echo "<table  class='table';>";
    echo "<thead>";
    echo "<tr>
      <th>Registration ID</th>
      <th>User Name</th>
      <th>Subcity</th>
      <th>Woreda</th>
      <th>Gender</th>
      <th>Phone No</th></tr>";
      echo "</thead>";
      echo "<tbody>";
    // Loop through the result set and output each row as a table row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        
        <td>" . $row["id_no"] . "</td>
        <td>" . $row["u_name"] . "</td>
        <td>" . $row["sub"] . "</td>
        <td>" . $row["woreda"] . "</td>
        <td>" . $row["gen"] . "</td>
        <td>" . $row["mob"] . "</td>
       </tr>";
    
    }
    echo "</tbody>";
    // End the table
    echo "</table>";
} else {
    // If there are no complaints in the database, output a message
    echo "No complaints found.";
}

if(isset($_POST['s2']))
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $uid=$_POST['uid'];
        
        $q1=mysqli_query($conn,"delete from user where id_no='$uid'");
        
    }
}  
        
?>



<script>
     function f1()
        {
          
 var sta2=document.getElementById("ciid").value;
  var x2=sta2.indexOf(' ');
  
    if(sta2!="" && x2>=0){
    document.getElementById("ciid").value="";
          alert("Blank Field Not Allowed");
        }
            
}
    
    
    
    </script>  



<form style="margin-top: 2%; margin-left: 40%;" method="post">
     <input type="text" name="uid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Registration Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-danger" type="submit" value="Delete user" name="s2" style="margin-top: 10px; margin-left: 9%;">
        </div>
    </form>

    <?php
      include("footer.php");
    ?>
    

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>