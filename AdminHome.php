<!-- <meta http-equiv="refresh" content="60; url=Adminlogin.php"> -->

<!DOCTYPE html>
<html>
<head>


	<title>Admin Homepage</title>
  <link rel="stylesheet" type="text/css" href="./Assets/css/AdminHome.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    
     
</head>
<body>


<header>

<div class="leftside">
    <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="official_login.php">Official Login</a>
             <a href="Adminlogin.php">Admin Login</a> 
         </nav>

          <ul class="navleft">
         <li >
      <a href="#" class="drop" style="background: rgba(255,255,255, .5);"> View Officers <ion-icon name="caret-down-outline"></ion-icon> </a>
      <ul class="dropdown" class="drop">

                <li class=""><a href="Admin_viewTaker.php"> View Taker</a></li>
                <li class=""><a href="Admin_viewHandler.php">View Handler</a></li>
                <li class=""><a href="Admin_viewpolice.php"> View Sub_police</a></li>
               
      </ul>       
    </li>

          </ul>
 </div>

 

    <nav class="navigation">
       
       <a href="AdminHome.php" class="active"> View users</a>
       <a href="Taker_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>
<h4 class='title'> Registered user Details </h4>


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
    echo "<table  class='table'>";
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



<form class="forms" method="post">
     <input type="text" name="uid" class="txts" placeholder="&nbsp Registration ID" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btns" type="submit" value="Delete user" name="s2" >
        </div>
    </form>

    <?php
      include("footers.php");
    ?>
    
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>