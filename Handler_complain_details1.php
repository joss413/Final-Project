<!DOCTYPE html>
<html>
<head>
    
    <?php
    include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Handlerlogin.php");
    
    
    
    $cid=$_SESSION['cid'];
        

    
    $result1=mysqli_query($conn,"SELECT location FROM p_handler");
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];

    
    $query="SELECT id_no,c_id,type_crime,d_o_c,repo_time_and_date,location,description from p_handler where c_id='$cid'  order by c_id desc";
    $result=mysqli_query($conn,$query); 
    $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$cid'");
    ?>

	<title>Handler Homepage</title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Handler_complain_details1.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
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
       
       <a href="Handler_complain_details.php" class="active"> Complaints Details</a>
       <a href="HandlerHome.php">View Complaints</a>
       <a href="Handler_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<h4 class='title'>Complaint Details</h4>

   <table class="table table-bordered">
     <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
        <th scope="col">Registration ID</th>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Reported Time and Date </th>
        <th scope="col">Location</th>
        <th scope="col">Descripition</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
        
     
          <td><?php echo $rows['id_no'];?></td>
          <td><?php echo $rows['c_id'];?></td>
          <td><?php echo $rows['type_crime'];?></td>     
          <td><?php echo $rows['d_o_c'];?></td>
          <td><?php echo $rows['repo_time_and_date'];?></td>
          <td><?php echo $rows['location'];?></td>
          <td><?php echo $rows['description'];?></td>
    </tr>
       </tbody>
       <?php
        } 
        ?>
</table>
 </div>
 

 <h4 class='title'>Case Details</h4>
   <table class="table table-bordered">
        <thead>
    <tr>
      <th scope="col" class="head">Date Of Update</th>
      <th scope="col" class="head">Case Update</th>
    </tr>
       </thead>
      <?php
              while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
       <tbody >
    <tr>
        
      <td class="head"><?php echo $rows1['d_o_u']; ?></td>
      <td class="head"><?php echo $rows1['case_update']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>
    
<?php
include("footer.php");
?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>