<!DOCTYPE html>
<html>
<head>
 

  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Admin.css">
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


<header>
         <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            
            <a href="home.php" > Home </a>
            <a href="Adminlogin.php" class="active"> Admin Login </a>
        
       
         </nav>   
</header>
<main>
	<div class="wrapper">
       <a href="official_login.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> Admin </h2>
	   	<form method="post">
           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required>
                <label for="exampleInputEmail1">Admin Id</label>
           
            </div>
             
           <div class="input-box" >
     
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" required>
                <label for="exampleInputPassword1">Password</label>
              </div>
              <button type="submit" class="btn" name="s">Login</button>
       </form>             
    </div>
    </div>
</main>



<?php

include("footers.php");
?>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>