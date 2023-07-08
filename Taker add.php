<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Admin') {
    header("Location: home.php");
    exit();
}
?>

<!-- <meta http-equiv="refresh"  content="60;url=Adminlogin.php"; -->
<!DOCTYPE html>
<html>
<head>
	<title>Add Taker log </title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Taker add.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	

<script>
     function f1()
        {
         var sta1=document.getElementById("tname").value;
         var sta2=document.getElementById("tid").value;
         var sta3=document.getElementById("pas").value;
         
         
         
         var x1=sta1.trim();
         var x2=sta2.indexOf(' ');
         var x3=sta3.indexOf(' ');
         
         
        if(sta1!="" && x1==""){
    document.getElementById("tname").value="";
    document.getElementById("tname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("tid").value="";
    document.getElementById("tid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
    }


    function myFunction(){

var x = document.getElementById("pas");
var y = document.getElementById("eye1");
var z = document.getElementById("eye2");

     if(x.type ==='password'){
        
         x.type ="text";
         y.style.display ="block";
         z.style.display="none";
     }

     else{
         x.type ="password";
         y.style.display ="none";
         z.style.display="block";
     
     }

    }







</script>
</head>

<body>

<?php
  include("connection.php");
    // session_start();
    if(!isset($_SESSION['x']))
        header("location:Adminlogin.php");
if(isset($_POST['s'])){
 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $t_name=$_POST['taker_name'];
        $t_id=$_POST['taker_id'];
        $t_pass=$_POST['password'];

      
        $hash = md5($t_pass);     
    $reg="insert into taker values('$t_id','$t_name','$hash')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "Taker Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Taker Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
 <header>

<div class="leftside">
    <a href="home.php"> 
      <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>

 </div>

    <nav class="navigation">
           <a href="home.php"> Home </a>
             <a href="Adminlogin.php">Admin Login</a>
             <a href="AdminHome.php">Admin Home</a>
       <a href="Taker add.php" class="active"> Add Taker </a>
       
       <a href="Admin_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<main>
	<div class="wrapper">
       <a href="Admin_viewTaker.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> Add Taker </h2>
	   	<form method="post">

           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" autocomplete="off" name="taker_name" placeholder="Taker Name" required="" id="tname" onfocusout="f1()"/>
                <label for="exampleInputName1">Taker Name</label>
           
            </div>


            <div class="input-box">
              
         
              <span class="icon"><ion-icon name="id-card"></ion-icon></span>
              <input type="email"  name="taker_id" placeholder="Taker Id" minlength="5" maxlength=5 required="" id="tid" onfocusout="f1()"/>
              <label for="exampleInputName1">Taker Id</label>
         
          </div>



           <div class="input-box" >
     
                <span class="icon" onclick="myFunction()">
                  <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                  <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                </span>
                <input type="text"  autocomplete="off" name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
                <label for="exampleInputPassword1">Password</label>
              </div>
              <button type="submit" class="btn" name="s" onclick="f1()"> Add </button>
              </form>             
       </div>
    </div>
</main>



<?php
include("footers.php");
?>

 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
