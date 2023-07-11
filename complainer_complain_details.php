<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'user') {
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
        header("location:userlogin.php");
    
    
    $u_id=$_SESSION['u_id'];
    $c_id=$_SESSION['cid'];
        

   
    $query="SELECT c_id,location,description,inc_status,pol_status,p_id from p_handler natural join user where c_id='$c_id' and u_id='$u_id'";
    $result=mysqli_query($conn,$query);
    
    $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$c_id'");


  ?>

	<title>Complaint Details</title>
    <link rel="stylesheet" type="text/css" href="./Assets/css/complainer-complain-details.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
   
    <body>
	

        <header>

<div class="leftside">
    <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
 </div>

    <nav class="navigation">
    
      <a href="home.php"> Home </a>
      <a href="complainer_complain_history.php" > Complaint History</a>
       
       <a href="complainer_complain_details.php" class="active"> Complaint Details </a>
       
       <a href="complainer_page.php">Log New Complain</a>
       <a href="userlogin.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<h4 class="title">Complaints Details</h4>
       
            <table class="table">
            <thead >
                <tr>
                    <th scope="col">Complain Id</th>
                    <th scope="col">Description</th>
                    <th scope="col">Police Status</th>
                    <th scope="col">Case Status</th>
                </tr>
            </thead>
            <?php
              while($rows=mysqli_fetch_assoc($result)){
            ?> 
             <tbody class="xbody" >
              <tr>
                <td><?php echo $rows['c_id']; ?></td>
                <td><?php echo $rows['description']; ?></td>     
                <td><?php echo $rows['inc_status']; ?></td>     
                <td><?php echo $rows['pol_status']; ?></td>
              </tr>
             </tbody>
            <?php
              } 
            ?>
            </table>
       
    
        <h4 class='title'>Case Details</h4>
            <table class="table" id="bottom-update">
               <thead >
                   <tr>
                        <th scope="col">Date Of Update</th>
                        <th  scope="col">Case Update</th>
                   </tr>
               </thead>
            <?php
                while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
                <tbody style="background-color: white; color: black;">
                <tr>
                    <td ><?php echo $rows1['d_o_u']; ?></td>
                    <td ><?php echo $rows1['case_update']; ?></td>
                </tr>
                </tbody>
            <?php
                } 
            ?>
          
            </table>
      
 
          
            </table>
        </div> 
    
        <?php
        include("footers.php");
        ?>
    
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>