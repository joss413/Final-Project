<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Admin') {
    header("Location: home.php");
    exit();
}
?>

<!-- <meta http-equiv="refresh"  content="60;url=Adminlogin.php"; -->
<!DOCTYPE html>
<html>
<head>
	<title> Add Handler log </title>

  <link rel="stylesheet" type="text/css" href="./Assets/css/Handler add.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

<script>
     function f1()
        {
         
         var sta1=document.getElementById("hname").value;
         var sta2=document.getElementById("hid").value;
         var sta3=document.getElementById("pas").value;
         
         
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
         
         
        if(sta1!="" && x1==""){
    document.getElementById("hname").value="";
    document.getElementById("hname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("hid").value="";
    document.getElementById("hid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
     
      }


      function myFunction(){

var x = document.getElementById("pas");
var y = document.getElementById("eye1");
var z = document.getElementById("eye2");

     if(x.type ==='password'){
        
         x.type ="text";
         y.style.display ="block";
         z.style.display="none";
     }

     else{
         x.type ="password";
         y.style.display ="none";
         z.style.display="block";
     
     }




    }




</script>
</head>

<body>
<?php
  include("connection.php");
    // session_start();
    if(!isset($_SESSION['x']))
        header("location:Adminlogin.php");
if(isset($_POST['s'])){
   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $h_name=$_POST['handler_name'];
        $h_id=$_POST['handler_id'];
        $h_pass=$_POST['password'];
        $hash = md5($h_pass);  
        

    
    $reg="insert into handler values('$h_id','$h_name','$hash')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "Handler Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Handler Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>

<header>

<div class="leftside">
    <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
 </div>

    <nav class="navigation">
       <a href="home.php"> Home </a>
       <a href="Adminlogin.php">Admin Login</a>
       <a href="AdminHome.php">Admin Home</a>
       <a href="Handler add.php" class="active"> Add Handler </a>
       
       <a href="Admin_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<main>
	<div class="wrapper">
       <a href="Admin_viewHandler.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> Add Handler </h2>
	   	<form method="post">

           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" autocomplete="off" name="handler_name" placeholder="Handler Name" required="" id="hname" onfocusout="f1()"/>
                <label for="exampleInputName1">Handler Name</label>
           
            </div>


            <div class="input-box">
              
         
              <span class="icon"><ion-icon name="id-card"></ion-icon></span>
              <input type="email" autocomplete="off" name="handler_id" placeholder="Handler Id" minlength="5" maxlength=5" required="" id="hid" onfocusout="f1()"/>
              <label for="exampleInputName1">Handler Id</label>
         
          </div>



           <div class="input-box" >
     
                <span class="icon" onclick="myFunction()">
                  <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                  <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                </span>
                <input type="text" autocomplete="off" name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
                <label for="exampleInputPassword1">Password</label>
              </div>
              <button type="submit" class="btn" name="s" onclick="f1()"> Add </button>
              </form>             
       </div>
    </div>
</main>
<?php

include('footers.php');

?>

 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>