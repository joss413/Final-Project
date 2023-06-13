<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="./Assets/css/userlogin.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <title>Complainant Login</title>  
    
    <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
          var x2=sta2.indexOf(' ');
          var x3=sta3.indexOf(' ');
    if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }

}

      function myFunction(){

            var x = document.getElementById("exampleInputPassword1");
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
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $_SESSION['start']=time();
    $_SESSION['expire']=$_SESSION['start'] + (10);
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=md5($_POST['password']);
        $result=mysqli_query($conn,"SELECT u_id,u_pass FROM user where u_id='$name' and u_pass='$pass' ");
       
          $u_id=$_POST['email'];
          $_SESSION['u_id']=$u_id;
   
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
         
          header("location:complainer_page.php");
        }
    }
    
}
?> 


<header>
         <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            
            <a href="home.php" > Home </a>
           
           <a href="" class="active"> User Login </a>
          
        
       
         </nav>   
</header>

<main>
	<div class="wrapper">
       <a href="home.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> User </h2>
	   	<form method="post">
           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                <input type="email"  id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter Your Email " required name="email" onfocusout="f1()">
                <label for="exampleInputEmail1">User Email</label>
           
            </div>
             
           <div class="input-box" >
     

                <span class="icon" onclick="myFunction()">
                  <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                  <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                </span>
                <input type="password" id="exampleInputPassword1" autocomplete="off" placeholder="Password" required name="password" onfocusout="f1()">
                <label for="exampleInputPassword1">Password</label>
              </div>
   
          <div class="remeber-forgot">
               <span> </span>
               <a href="Forgot-password.php"> Forgot Password? </a>
          </div>
            
          <button type="submit" class="btn" name="s" onclick="f1()">Login</button>

      <div class="login-register">
            <p> Don't have an account? <a href="registration.php" class="register-link"> Register </a></p>
      </div>
       </form>             
    </div>
    </div>
</main>
<?php
include("footers.php");
?>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>