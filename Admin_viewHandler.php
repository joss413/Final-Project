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
            $hid=$_POST['hid'];
            
            $q1=mysqli_query($conn,"delete from handler where h_id='$hid'");
           
        }
    }
    $query="select h_id,h_name from handler";
    $result=mysqli_query($conn,$query);  
  ?>
	<title>Admin Add Handler </title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Admin_viewhadler.css">
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
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="Adminlogin.php">Admin Login</a>
             <a href="AdminHome.php">Admin Home</a>

         </nav>
 </div>

    <nav class="navigation">
       
       <a href="Admin_viewHandler.php" class="active"> View Handler </a>
       
       <a href="Admin_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>



<button class="btn-primary"> <a href="Handler add.php" class="intern"> Add Handler </a> </button>





   <table class="table">
    <thead>
      <tr>
        <th scope="col">Handler Id</th>
        <th scope="col">Handler Name</th>
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody >
      <tr>
        <td><?php echo $rows['h_id']; ?></td>
        <td><?php echo $rows['h_name']; ?></td> 
             
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 


 <form class="forms" method="post" >
     <input type="text" name="hid" class="txts" placeholder="&nbsp Handler Id" id="ciid" onfocusout="f1()" required>
        <div>
        
        <input class="btn-danger" type="submit" value="Delete Handler" name="s2" > 
        </div>
    </form>

<?php
include("footers.php");
?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>


