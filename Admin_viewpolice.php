<!DOCTYPE html>
<html>
<head>
    <?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Adminlogin.php");
  
    if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST['pid'];
            
            $q1=mysqli_query($conn,"delete from sub_police where p_id='$pid'");
            $q3=mysqli_query($conn,"update complaint set pol_status='null',inc_status='Unassigned',p_id='Null' where T_id='$pid'");
        }
    }




    $query="select p_id,p_name,spec,location from sub_police";
    $result=mysqli_query($conn,$query);  
    ?>
    
	<title>Admin Add Sub_Police </title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


  <script>
     function f1()
        {
         var sta1=document.getElementById("ciid").value;

         var x1=sta1.indexOf(' ');
         if(sta1!="" && x1>=0){
            document.getElementById("ciid").value="";
            alert("Blank Field not Allowed");
      }
    }
      </script>

</head>
<body>
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
        <li><a href="official_login.php">Official Login</a></li>
           
        <li><a href="Adminlogin.php">Admin Login</a></li>
        <li class="active"><a href="AdminHome.php">Admin Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="AdminHome.php"> Admin </a></li>
        <li class="active" ><a href="Admin_viewpolice.php">View Sub_Police</a></li>
        <li><a href="Admin_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
   
 <div  style="margin-top: 10%;margin-left: 45%">
     
   <a href="Sub_Police add.php" class="btn btn-primary">Add Sub_Police </a>
 </div>
    
<div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Police Id</th>
        <th scope="col">Police Name</th>
        <th scope="col">Police Spec</th>
        <th scope="col">Location of Police </th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['p_id']; ?></td>
        <td><?php echo $rows['p_name']; ?></td> 
        <td><?php echo $rows['spec']; ?></td>    
        <td><?php echo $rows['location']; ?></td>         
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>

 <form style="margin-top: 2%; margin-left: 40%;" method="post">
     <input type="text" name="pid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-danger" type="submit" value="Delete Sub_police" name="s2" style="margin-top: 10px; margin-left: 9%;">
        </div>
    </form>

<?php

include("footer.php");
?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>