<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Admin') {
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
  <link rel="stylesheet" type="text/css" href="./Assets/css/Admin_viewTaker.css">
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

 <header>

     <div class="leftside">
         <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
              
                <nav class="navleft">
                  <a href="home.php"> Home </a>
                  <a href="Adminlogin.php">Admin Login</a>
                  <a href="AdminHome.php">Admin Home</a>

              </nav>
      </div>

         <nav class="navigation">
            
            <a href="Admin_viewTaker.php" class="active"> View Taker </a>
            
            <a href="Admin_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        
       
         </nav>   
</header>


     
   <button class="btn-primary"> <a href="Taker add.php" class="intern"> Add Taker </a> </button>
 
    

   <table class="table">
    <thead >
      <tr>
        <th scope="col">Taker Id</th>
        <th scope="col">Taker Name</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody>
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

 <form class="forms" method="post">
     <input type="text" name="tid" class="txts" placeholder="&nbsp Taker Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn-danger" type="submit" value="Delete Taker" name="s2" >
        </div>
    </form>

    <?php

    include("footers.php");
    ?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>