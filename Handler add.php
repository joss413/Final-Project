<!DOCTYPE html>
<html>
<head>
	<title>Add Handler log </title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
	<?php
  include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Adminlogin.php");
if(isset($_POST['s'])){
   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $h_name=$_POST['handler_name'];
        $h_id=$_POST['handler_id'];
        $h_pass=$_POST['password'];
        

    
    $reg="insert into handler values('$h_id','$h_name','$h_pass')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
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
</script>
</head>

<body style="background-size: cover;
    background-image: url(pictures/insertpart.jpg);
    background-position: center;">
	<nav  class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b> On_The_Go Incident Reporter</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Admin Login</a></li>
        <li><a href="AdminHome.php">Admin Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="Handler add.php"> Log Handler </a></li>
      <li> <a href="Admin_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p>
                <h2>Log Handler </h2><br>
      <form  method="post" style="color: gray">
      
      
      Handler Name<input type="text"  name="handler_name" placeholder="Handler Name" required="" id="hname" onfocusout="f1()"/>
	  Handler Id<input type="email"  name="handler_id" placeholder="Handler Id" minlength="5" maxlength=5" required="" id="hid" onfocusout="f1()"/>
					<br>
      Password<input type="text"  name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
	                <input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

<?php

include('footer.php');

?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>