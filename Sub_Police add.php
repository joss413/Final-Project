<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Admin') {
    header("Location: home.php");
    exit();
}
?>

<!-- <meta http-equiv="refresh"  content="60 ; url=Adminlogin.php"> -->
<!DOCTYPE html>
<html>
<head>
	<title>Add police log </title>

  <link rel="stylesheet" type="text/css" href="./Assets/css/Sub_Police add.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

<script>
     function f1()
        {
         var sta=document.getElementById("loc").value;
         var sta1=document.getElementById("pname").value;
         var sta2=document.getElementById("pid").value;
         var sta3=document.getElementById("pas").value;
         var sta4=document.getElementById("spec").value;
         var x=sta.trim();
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
         var x4=sta4.trim();
         
 if(sta!="" && x==""){
    document.getElementById("loc").value="";
    document.getElementById("loc").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1==""){
    document.getElementById("pname").value="";
    document.getElementById("pname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pid").value="";
    document.getElementById("pid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("spec").value="";
    document.getElementById("spec").focus();
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
        $location=$_POST['location'];
        $p_name=$_POST['police_name'];
        $p_id=$_POST['police_id'];
        $p_pass=$_POST['password'];
        $hash = md5($p_pass);  
        $spec=$_POST['specification'];

    
    $reg="insert into sub_police values('$p_name','$p_id','$spec','$location','$hash')";
     mysqli_select_db($conn,"on_the_go incident reporter");
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "Subcity Police Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Subcity Police Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>








<header>

<div class="leftside">
    <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
          
 </div>

    <nav class="navigation">
   
      <a href="home.php"> Home </a>
      
      <a href="Adminlogin.php">Admin Login</a>

      <a href="AdminHome.php">Admin Home</a>

       <a href="Sub_Police add.php" class="active"> Add Sub_Police </a>
       
       <a href="Admin_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<main>
	<div class="wrapper">
       <a href="Admin_viewpolice.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> Add Sub_Police </h2>
	   	<form method="post">

           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text"autocomplete="off" name="police_name" placeholder="Police Name" required="" id="pname" onfocusout="f1()"/>
                <label for="exampleInputName1">Police Name</label>
           
            </div>


            <div class="input-box">
              
         
              <span class="icon"><ion-icon name="id-card"></ion-icon></span>
              <input type="email" autocomplete="off"  name="police_id" placeholder="Police Id" minlength="5" maxlength="5"required="" id="pid" onfocusout="f1()"/>
              <label for="exampleInputName1">Police Id</label>
         
          </div>

          <div class="input-dropdown">

                  <p style="margin-bottom:8px; padding-left:3px; color:white"> Location of Police </p>  
                        <select class="form-control" name="location" placeholder="Police Location" required="" id="loc" onfocusout="f1()">
                          <option>Akaki-Kality</option>
                          <option>Addis Ketema</option>
                          <option>Arada</option>
                          <option>Bole</option>
                          <option>Gulele</option>
                          <option>Kolfe Keranio</option>
                          <option>Lideta</option>
                          <option>Nefas Silk-Lafto</option>
                          <option>Kirkos</option>
                          <option>Yeka</option>
                          <option>Lemi Kura</option>
                          
                        </select>
             <div>  

             <div class="input-dropdown">

                      <p style="margin-bottom:8px; padding-left:3px; color:white;"> Specification </p>  
                            <select class="form-control" name="specification" placeholder="specification" required="" id="spec" onfocusout="f1()">
                            
                                      <option>Constable</option>
                                      <option>Sergeant</option>
                                      <option>Inspector</option>
                                      <option>Commander</option>
                                      <option>Commissioner</option>
                            
                              
                            </select>
                      <div>     




           <div class="input-box" >
     
                <span class="icon" onclick="myFunction()">
                  <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                  <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                </span>
                <input type="text" autocomplete="off" name="password" placeholder="6 Character minimum" pattern=".{6,}" required="" id="pas" onfocusout="f1()"/>
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