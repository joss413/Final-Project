<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="./Assets/css/Sub_policelogin.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<title>Subcity Police Login</title>

    
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
  
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=md5($_POST['password']);
        $result=mysqli_query($conn,"SELECT p_id,p_pass FROM sub_police where p_id='$name' and p_pass='$pass' ");
        $_SESSION['pol']=$name;       
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:Sub_policeHome.php");
        }
    }                
}
?> 
<header>
         <a href=""> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            
            <a href="home.php" > Home </a>
            <a href="Sub_policelogin.php" class="active"> Subcity Police Login </a>
        
       
         </nav>   
</header>
<main>
	<div class="wrapper">
       <a href="official_login.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>

          <div class="form-box login">
          <h2> Subcity Police  </h2>
	   	<form method="post">
        
           <div class="input-box">
              
         
                <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp" size="5" placeholder="Enter user id" required onfocusout="f1()">
                <label for="exampleInputEmail1">Subcity Police Id</label>
           
            </div>


             
           <div class="input-box" >
     
               <span class="icon" onclick="myFunction()">
                  <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                  <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                </span>
                <input type="password" name="password" class="form-control" autocomplete="off" id="exampleInputPassword1" placeholder="Password" required onfocusout="f1()">
                <label for="exampleInputPassword1">Password</label>
              </div>
              <button type="submit" class="btn" name="s">Login</button>
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