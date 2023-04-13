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
            $tid=$_POST['tid'];
            
            $q1=mysqli_query($conn,"delete from taker where T_id='$tid'");
            
        }
    }

    $query="select T_id,T_name from taker";
    $result=mysqli_query($conn,$query);  
    ?>
    
	<title>Admin Add Taker </title>
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
        <li class="active" ><a href="Admin_viewTaker.php">View Taker</a></li>
        <li><a href="Admin_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
   
 <div  style="margin-top: 10%;margin-left: 45%">
     
   <a href="Taker add.php" class="btn btn-primary">Add Taker </a>
 </div>
    
<div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Taker Id</th>
        <th scope="col">Taker Name</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['T_id']; ?></td>
        <td><?php echo $rows['T_name']; ?></td> 
             
      </tr>
    </tbody>
    
    <?php
    } 
    ?>

    
</table>
 </div>

 <form style="margin-top: 2%; margin-left: 40%;" method="post">
     <input type="text" name="tid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Taker Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-danger" type="submit" value="Delete Taker" name="s2" style="margin-top: 10px; margin-left: 9%;">
        </div>
    </form>

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