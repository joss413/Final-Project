<!DOCTYPE html>
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<title>Admin Login</title>
  <?php
    include("connection.php");
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;

    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $result=mysqli_query($conn,"SELECT admin_id,admin_pass FROM admin where admin_id='$name' and admin_pass='$pass' ");
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:AdminHome.php");
        }
    }                
}
?> 
</head>
<body style="color: black;background-image: url(pictures/admin.jpg);background-size: 100%;background-repeat: no-repeat;back">
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php"><b>On_the_Go Incident Reporter</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="official_login.php">Official Login</a></li>
        <li class="active"><a href="Adminlogin.php">Admin Login</a></li>
      </ul>
    
    </div>
  </div>
 </nav>
 <div  align="center" >
  <div class="form" style="margin-top: 15%">
    <form method="post">
  <div class="form-group" style="width: 30%">
    <label for="exampleInputEmail1"  ><h1 style="color:#fff">Admin Id</h1></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required>
     </div>
  <div class="form-group" style="width:30%">
    <label for="exampleInputPassword1"><h1 style="color:#fff">Password</h1></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="s">Login</button>
</form>
  </div>
</div>

<?php

include("footer.php");
?>


</body>
</html>