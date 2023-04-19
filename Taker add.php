
<!DOCTYPE html>
<html>
<head>
	<title>Add Taker log </title>
  <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/Taker add.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
	<?php
  include("connection.php");
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Adminlogin.php");
if(isset($_POST['s'])){
 
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        $t_name=$_POST['taker_name'];
        $t_id=$_POST['taker_id'];
        $t_pass=$_POST['password'];

        $hash = password_hash($t_pass,PASSWORD_DEFAULT);

   
    $reg="insert into taker values('$t_id','$t_name','$hash')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
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
</script>
</head>

<body>


 <header>

<div class="leftside">
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logo.jpg" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="Adminlogin.php">Admin Login</a>
             <a href="AdminHome.php">Admin Home</a>
            

         </nav>
 </div>

    <nav class="navigation">
       
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
     
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
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
