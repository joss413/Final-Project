<!DOCTYPE html>
<html>
<head>


    <?php
include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Sub_policelogin.php");
    
    $cid=$_SESSION['cid'];
    $p_id=$_SESSION['pol'];    
    
    $query="select c_id,type_crime,d_o_c,description,mob,sub,woreda from p_handler natural join user where c_id='$cid' and p_id='$p_id'";
    $result=mysqli_query($conn,$query);  
    
    if(isset($_POST['status'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $upd=$_POST['update'];
            $qu1=mysqli_query($conn,"insert into update_case(c_id,case_update) values('$cid','$upd')");
        }
    }
    
    if(isset($_POST['close'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $up=$_POST['final_report'];
            $qu2=mysqli_query($conn,"insert into update_case(c_id,case_update) values('$cid','$up')");
            $q2=mysqli_query($conn,"update p_handler set pol_status='ChargeSheet Filed' where c_id='$cid'");
           
        }
    }
     $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$cid'");
    
    ?>

	<title> Subcity Police Homepage</title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Sub_police_complainDetails.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
        if(sta2=="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank FIeld Not Allowed");
        }
      }
    </script>
</head>
<body>

 <header>

<div class="leftside">
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logo.jpg" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
           
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="Sub_police_complainDetails.php" class="active"> Complaints Details</a>
       <a href="Sub_policeHome.php">View Complaints</a>
       <a href="Sub_police_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>



<h4 class='title'>Complaint Details</h4>

   <table class="table">
    <thead>
    <tr>
      <th scope="col">Complaint Id</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date of Crime</th>
      <th scope="col">Description</th>
        <th scope="col">Complainant Mobile</th>
        <th scope="col">Complainant Address</th>
        <th scope="col">Woreda</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
    <tbody>
       <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>
        <td><?php echo $rows['d_o_c']; ?></td>
        <td><?php echo $rows['description']; ?></td>
        <td><?php echo $rows['mob']; ?></td>
        <td><?php echo $rows['sub']; ?></td>
        <td><?php echo $rows['woreda']; ?></td>
        
        
       </tbody>
       <?php
} 
?>
          
</table>

    
<h4 class='title'>Case Details</h4>
   <table class="table">
        <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th class="head" scope="col">Date Of Update</th>
      <th class="head" scope="col">Case Update</th>
    </tr>
       </thead>
      <?php
              while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
        
      <td id="tdpart" class="head"><?php echo $rows1['d_o_u']; ?></td>
      <td id="tdpart" class="head"><?php echo $rows1['case_update']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>


  <div class="divp" > 
    
    <div class="divs" > 
     
     <form method="post">
    
      <h3 class="title">Complaint ID</h3>                 
      <input  class="txts" type="text" name="cid"  disabled value="<?php echo "$cid" ?>">
        
         
      <select id="form" name="update">
          <option>Criminal Verified</option>
          <option>Criminal Caught</option>
          <option>Criminal Interrogated</option>
          <option>Criminal Accepted the Crime</option>
          <option>Criminal Charged</option>
      </select>

      <input class="btn-primary " type="submit" value="Update Case Status" name="status" >
        
    </form>
    </div>     
    
     <div class="divthird" >
     <form method="post">
     <textarea class="textarea" name="final_report" cols="40" rows="5" placeholder="Final Report" id="ciid" onfocusout="f1()" required></textarea>
     <div>
      <input  class="btn-danger" type="submit" value="Close Case" name="close" >
       </div> 
    </form>
  </div>

 </div>


 <?php

 include("footers.php");
 ?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>