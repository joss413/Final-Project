<!DOCTYPE html>
<html>
<head>
	<title>Add police log </title>

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
        $location=$_POST['location'];
        $p_name=$_POST['police_name'];
        $p_id=$_POST['police_id'];
        $p_pass=$_POST['password'];
        $spec=$_POST['specification'];

    
    $reg="insert into sub_police values('$p_name','$p_id','$spec','$location','$p_pass')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Subcity Police Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
<script>
     function f1()
        {
         var sta=document.getElementById("loc").value;
         var sta1=document.getElementById("pname").value;
         var sta2=document.getElementById("pid").value;
         var sta3=document.getElementById("pas").value;
         var sta4=document.getElementById("spec").value;
         var x=sta.trim();
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
         var x4=sta4.trim();
         
 if(sta!="" && x==""){
    document.getElementById("loc").value="";
    document.getElementById("loc").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1==""){
    document.getElementById("pname").value="";
    document.getElementById("pname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pid").value="";
    document.getElementById("pid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("spec").value="";
    document.getElementById("spec").focus();
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
      <a class="navbar-brand" href="home.php"><b> On_The_Go Incident Reporter </b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Admin Login</a></li>
        <li><a href="AdminHome.php">Admin Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="Sub_Police add.php">Log Sub_Police </a></li>
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
                <h2>Log Sub_Police </h2><br>
      <form  method="post" style="color: gray">
      
      <div class="top-w3-agile" style="color: gray">Location of Police
                    
             <select class="form-control" name="location" placeholder="Police Location" required="" id="loc" onfocusout="f1()">
						
                <option>Akaki-Kality</option>
						  	<option>Addis Ketema</option>
							  <option>Arada</option>
                <option>Bole</option>
                <option>Gulele</option>
                <option>Kolfe Keranio</option>
                <option>Lideta</option>
                <option>Nefas Silk-Lafto</option>
                <option>Kirkos</option>
                <option>Yeka</option>
                <option>Lemi Kura</option>   
					
				    </select>
				</div>
      Police Name
					<input type="text"  name="police_name" placeholder="Police Name" required="" id="pname" onfocusout="f1()"/>
					Police Id<input type="text"  name="police_id" placeholder="Police Id" minlength="5" maxlength="5"required="" id="pid" onfocusout="f1()"/>
					<br>
          <div class="top-w3-agile" style="color: gray"> Specification
                    
                    <select class="form-control"name="specification" placeholder="specification" required="" id="spec" onfocusout="f1()">
                   
                       <option>Inspector</option>
                       <option>Surf</option>

                    </select>
			   	</div>            
					Password<input type="text"  name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

<?php
include("connection.php");
?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>