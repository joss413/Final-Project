<!DOCTYPE html>
<html>
<head>
	<title>Police completed complaint</title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/sub_police_complete.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
     <?php
     include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Sub_policelogin.php");
     
  
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location,mob,sub,woreda FROM p_handler natural join user where p_id='$p_id' and pol_status='ChargeSheet Filed' order by c_id desc");
    ?>

</head>
<body>

     <header>

<div class="leftside">
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="official_login.php">Official Login</a>
             <a href="Sub_policelogin.php">Subcity Police Login</a>
           
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="Sub_police_complete.php" class="active"> Completed Complaints</a>
       <a href="Sub_policeHome.php">Pending Complaints</a>
       <a href="Sub_police_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>



    
 <h4 class='title'>Complaint Details</h4> 
   <table class="table">
    <thead >
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
          <th scope="col">Location of Crime</th>
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
        <td><?php echo $rows['location']; ?></td>
        <td><?php echo $rows['mob']; ?></td>
        <td><?php echo $rows['sub']; ?></td>
        <td><?php echo $rows['woreda']; ?></td>
                   
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>

<?php
 include("footer.php")
?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>