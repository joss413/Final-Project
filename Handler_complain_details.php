<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'handler') {
    header("Location: home.php");
    exit();
}
?>




<!DOCTYPE html>
<html>
<head>

    <?php
    include("connection.php");
    // session_start();
    if(!isset($_SESSION['x']))
        header("location:Handlerlogin.php");
    
   

    $cid=$_SESSION['cid'];
    
    $result1=mysqli_query($conn,"SELECT location FROM p_handler");
    $q2=mysqli_fetch_assoc($result1);
    

    $query="SELECT id_no,c_id,type_crime,d_o_c,repo_time_and_date,location,description from p_handler where c_id='$cid'";
    $result=mysqli_query($conn,$query); 
   

    if(isset($_POST['assign']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $pname=$_POST['police_name'];
        $res1=mysqli_query($conn,"SELECT p_id FROM sub_police where p_name='$pname'");
        $q3=mysqli_fetch_assoc($res1);
        $pid=$q3['p_id'];
      
      
        $res=mysqli_query($conn,"update p_handler set inc_status='Assigned',pol_status='In Process',p_id='$pid' where c_id='$cid'");
      
        $message = "Case Assigned Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>

	<title>Assign Police</title>

  <link rel="stylesheet" type="text/css" href="./Assets/css/Handler_complain_details.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
</head>
<body>
    
 <header>

<div class="leftside">
    <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
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

<h4 class="title">Complaints Details</h4>
<body>
   <table class="table">
    <thead >
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
                $location=$rows['location'];
              //  echo $location;
             ?> 
       <tbody>
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

<form method="post">
<select  name="police_name" style="margin-left:40%; width:250px; height:30px;">
            <?php
                        $p_name=mysqli_query($conn,"SELECT p_name,location from sub_police ");
                        while($row=mysqli_fetch_array($p_name))

                        {
                        if($row['location'] == $location){
                            ?>
                                  <option> <?php echo $row['p_name']; ?> </option>
                            <?php
                        }
                        }
                        ?>
          
            </select>
            <input type="submit" name="assign" value="Assign Case" class="btns" style="margin-top:10px; margin-left:45%;">
</form>
 </div>

 <?php
 include("footer.php");
 ?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>