
 

<!DOCTYPE html>
<html>
<head>
	<title>Add Taker log </title>

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
    
        $t_name=$_POST['taker_name'];
        $t_id=$_POST['taker_id'];
        $t_pass=$_POST['password'];

        $hash = password_hash($t_pass,PASSWORD_DEFAULT);

   
    $reg="insert into taker values('$t_id','$t_name','$hash')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Taker Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
<script>
     function f1()
        {
         
            
            
           






         var sta1=document.getElementById("tname").value;
         var sta2=document.getElementById("tid").value;
         var sta3=document.getElementById("pas").value;
         
         
         
         var x1=sta1.trim();
         var x2=sta2.indexOf(' ');
         var x3=sta3.indexOf(' ');
         
         
        if(sta1!="" && x1==""){
    document.getElementById("tname").value="";
    document.getElementById("tname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("tid").value="";
    document.getElementById("tid").focus();
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
      <a class="navbar-brand" href="home.php"><b>On_The_Go Incident Reporter</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Admin Login</a></li>
        <li><a href="AdminHome.php">Admin Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="Taker add.php"> Log Taker </a></li>
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
                <h2>Log Taker </h2><br>
      <form  method="post" style="color: gray">
      
      
      Taker Name<input type="text"  name="taker_name" placeholder="Taker Name" required="" id="tname" onfocusout="f1()"/>
	  Taker Id<input type="email"  name="taker_id" placeholder="Taker Id" minlength="5" maxlength=5"required="" id="tid" onfocusout="f1()"/>
					<br>
      Password<input type="text"  name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
	                <input type="submit" value="Submit" name="s">


           
				</form>	
			</div>	
		</div>
	</div>	
</div>	

<div style="position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color:#3b3b3b;
            color: white;
            text-align: center;">
            <h4 style="color: white;">&copy <b>On_The_Go Incident Reporter</b></h4>
         </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
