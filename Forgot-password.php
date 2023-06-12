<!-- <meta http-equiv="refresh" content="60;url=userlogin.php">  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/Forgot-password.css">
	  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	 <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
     
     <script>
     function f1()
        {
         var sta2=document.getElementById("InputEmail1").value;
         var sta3=document.getElementById("InputCode1").value;
               
           var x2=sta2.indexOf(' ');
           var x3=sta3.indexOf(' ');

                if(sta2!="" && x2>=0){
                document.getElementById("InputEmail1").value="";
                document.getElementById("InputEmail1").focus();
                alert("Space Not Allowed");
                    }
                else if(sta3!="" && x3>=0){
            document.getElementById("InputCode1").value="";
            document.getElementById("InputCode1").focus();
            alert("Space Not Allowed");
                }

        }



function myFunction(){

var x = document.getElementById("InputCode1");
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
    
     <title>Forgot Password</title>

</head>
<body>

<?php
 include("connection.php");
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
  
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['email'];
        $code=md5($_POST['code']);
        $result=mysqli_query($conn,"SELECT u_id,code FROM user where u_id='$email' and code='$code' ");
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or code not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:Reset-password.php");
        }
    }                
}
?> 









    
        <header>
         <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            <a href="Forgot-password.php" class="active"> Forgot Password </a>
            <a href="userlogin.php"> User Login </a>
    
           
         </nav>   
        </header>

        <main>
	       <div class="wrapper">
                <a href="userlogin.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

                    <div class="form-box login">
                    <h2> Security Questions </h2>
                    <form method="post">
                
                    <div class="input-box">
              
         
                <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                <input type="email"  id="InputEmail1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter Email id" required name="email" onfocusout="f1()">
                <label for="exampleInputEmail1">User Id</label>
           
                         </div>



                    <div class="input-box">
              
         
                            <span class="icon" onclick="myFunction()">
                                <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                                <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                            </span>
                            <input type="password"  id="InputCode1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter code " required name="code" onfocusout="f1()">
                            <label for="exampleInputEmail1"> Recovery code </label>
         
                 </div>

                 <button type="submit" class="btn" name="s" onclick="f1()">Login</button>
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