<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../on_the_go incident reporter/Assets/css/Reset-password.css">
	  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	 <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
     
     <script>
     function f1()
        {

         
  
     var sta1=document.getElementById("InputEmail1").value;
     var sta2=document.getElementById("InputPass1").value;
     var sta3=document.getElementById("InputConfirm1").value;

                    var x1=sta1.indexOf(' ');
                    var x2=sta2.indexOf(' ');
                    var x3=sta3.indexOf(' ');

    if(sta1!="" && x1>=0){
    document.getElementById("InputPass1").value="";
    document.getElementById("InputPass1").focus();
      alert("Space Not Allowed");
       }

    else if(sta2!="" && x2>=0){
    document.getElementById("InputPass1").value="";
    document.getElementById("InputPass1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("InputConfirm1").value="";
    document.getElementById("InputConfirm1").focus();
      alert("Space Not Allowed");
        }

}




    </script>
    
     <title>Reset Password</title>

</head>
<body>
    
<?php
include("connection.php");
session_start();
if(!isset($_SESSION['x']))
    header("location:userlogin.php");

if(isset($_POST['reset'])){
    $email = $_POST['email'];
    $new_password = $_POST['password'];

    // Check if email exists in user table
    $query = "SELECT * FROM user WHERE u_id = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if($count == 1){
        // Update user password
        $q2 = mysqli_query($conn,"UPDATE user SET u_pass = '$new_password' WHERE u_id = '$email'");
        $message = "Password updated successfully!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } 
    
    else {
      
        $message = "Invalid email address!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>



        <header>
         <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            <a href="home.php" class="active"> Home </a>
            <a href="userlogin.php"> User Login </a>
    
           
         </nav>   
        </header>

        <main>
	       <div class="wrapper">
                <a href="Forgot-password.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

                    <div class="form-box login">
                    <h2> Reset Password </h2>
                    <form method="post">
                
                    <div class="input-box">
              
         
                          <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                          <input type="email"  id="InputEmail1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter Email id" required name="email" onfocusout="f1()">
                          <label for="exampleInputEmail1">User Id</label>
                    
                       </div>


                   
                    <div class="input-box">
              
         
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password"  id="InputPass1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter New password" required name="password" onfocusout="f1()">
                            <label for="exampleInputEmail1"> New Password </label>
         
                 </div>

                 <button type="submit" class="btn" name="reset" onclick="f1()">Reset</button>
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