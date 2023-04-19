<!-- <meta http-equiv="refresh"  content="60 ; url=Sub_policelogin.php"> -->
<!DOCTYPE html>
<html>
<head>
	<title>subcity Police pending complain</title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Sub_policeHome.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
     <?php
     include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Sub_policelogin.php");
    
    if(isset($_POST['s2']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
       $cid=$_POST['cid'];
       $_SESSION['cid']=$cid;
       $joss=mysqli_query($conn,"select p_id from p_handler where c_id='$cid'");
       $row = mysqli_fetch_assoc($joss);
       $p_id=$_SESSION['pol'];
     if($row['p_id']==$p_id){
     header("location:Sub_police_complainDetails.php");}
     else{
         $message = "Not in your scope";
        echo "<script type='text/javascript'>alert('$message');</script>";
     }
 }
}
    
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location FROM p_handler where p_id='$p_id' and pol_status='In Process' order by c_id desc");
    ?>
 <script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
      if(sta2!="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank Field Found");
        }
}
</script>
</head>
<body>

    <header>

<div class="leftside">
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="official_login.php">Official Login</a>
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="Sub_policeHome.php" class="active"> Pending Complaints </a>
       <a href="Sub_police_complete.php">Completed Complaints</a>
       <a href="Sub_police_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>


<form class="forms" method="post">
<input type="text" name="cid" class="txts" placeholder="&nbsp Complaint Id" onfocusout="f1()" required id="ciid">

   <div>
   <input class="btns" type="submit" value="Search" name="s2" >
   </div>
</form>




   <table class="table">
    <thead>
      <tr>
        <th  scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location of Crime</th>
        
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody >
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td> 
        <td><?php echo $rows['location']; ?></td> 
                  
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>



<?php
include("footer.php");
?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>