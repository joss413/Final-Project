<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>

<link href="../on_the_go incident reporter/Assets/css/registration.css" rel="stylesheet" type="text/css" media="all" />

  
<script>
     function f1()
        {
            var sta=document.getElementById("name1").value;
            var sta1=document.getElementById("email1").value;
            var sta2=document.getElementById("pass").value;
            var sta3=document.getElementById("addr").value;
            var sta4=document.getElementById("id").value;
            var sta5=document.getElementById("mobno").value;
            var sta6=document.getElementById("cd").value;
	   
  var x=sta.trim();
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
  //var x3=sta3.trim();
  var x3=sta3.indexOf(' ');
  var x4=sta4.indexOf(' ');
	var x5=sta5.indexOf(' ');
  var x6=sta6.indexOf(' ');

	if(sta!="" && x==""){
		document.getElementById("name1").value="";
		document.getElementById("name1").focus();
		  alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1>=0){
    document.getElementById("email1").value="";
    document.getElementById("email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pass").value="";
    document.getElementById("pass").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3==""){
    document.getElementById("addr").value="";
    document.getElementById("addr").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("id").value="";
    document.getElementById("id").focus();
      alert("Space Not Allowed");
        }
        else if(sta5!="" && x5>=0){
    document.getElementById("mobno").value="";
    document.getElementById("mobno").focus();
      alert("Space Not Allowed");
        }

        else if(sta6!="" && x6==""){
    document.getElementById("cd").value="";
    document.getElementById("cd").focus();
      alert("Space Not Allowed");
        }
}


function myFunction(){

var x = document.getElementById("pass");
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
if(isset($_POST['s'])){

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u_name=$_POST['name'];
        $u_id=$_POST['email'];
        $u_pass=$_POST['password'];
        $sub=$_POST['subcity'];
        $woreda=$_POST['adress'];
        $id_no=$_POST['id_number'];
        $gen=$_POST['gender'];
        $mob=$_POST['mobile_number'];
        $code=$_POST['code'];
       // $password=md5($u_pass);
       $reg="insert into user values('$u_name','$u_id','$u_pass','$sub','$woreda','$id_no','$gen','$mob','$code')";
        
        $res=mysqli_query($conn,$reg);
        if(!$res)
        {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        $message = "User Registered Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
<header>
         <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            
            <a href="home.php" > Home </a>
           
           <a href="" class="active"> Registration Login </a>
        
       
         </nav>   
</header>

	
<main>
	<div class="wrapper">
      <a href="userlogin.php" class="icon-close"> <ion-icon name="close-outline"></ion-icon></a>
         <div class="form-box login">
             <h2> Registration </h2>	
				          <form action="#" method="post">

                       <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text"  name="name" placeholder="Enter Full name" autocomplete="off" autocomplete="off" required="" id="name1" onfocusout="f1()" />
                            <label>Full Name <span color="red">*</span></label>
                      </div>	

                       <div class="input-box">
                             <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email"  name="email"  placeholder="Enter email id" required=""  autocomplete="off" id="email1" onfocusout="f1()"/>
                            <label>Email-Id <span color="red">*</span></label>         
        
                       </div>

                      <div class="input-box">
                         <span class="icon" onclick="myFunction()">
                            <ion-icon id="eye1" name="eye-sharp"></ion-icon>
                            <ion-icon id="eye2"   name="eye-off-sharp"></ion-icon>
                          </span>
  
                             <input type="password"  placeholder="6 Character minimum" autocomplete="off" pattern=".{6,}" required name="password" id="pass" onfocusout="f1()"> 
                             <label>Password <span color="red">*</span></label>
                       </div>

                          
                      <div class="input-dropdown">

                       <p style="margin-bottom:8px; padding-left:3px; opacity:0.7"> Home Subcity <span color="red">*</span> </p>  
                              <select class="form-control" name="subcity">
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
                      


                      <div class="input-box">
            
                              <span class="icon"><ion-icon name="home"></ion-icon></span> 
                              <input type="text"  name="adress" placeholder=" Enter Woreda" minlength="2" autocomplete="off" maxlength="2" required pattern="[0-9]{2}" id="addr" onfocusout="f1()"/>
                              <label>Woreda <span color="red">*</span></label>

                     </div>


                      <div class="input-box">

                            <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                            <input type="text"  name="id_number" minlength="5" placeholder="Enter Id Number"  autocomplete="off"  maxlength="5" required pattern="[0-9]{5}" id="id" onfocusout="f1()"/>
                            <label>ID Number <span color="red">*</span></label>

                    </div>

                    <div class="input-dropdown">

                    <p style="margin-bottom:8px; padding-left:3px; opacity:0.7"> Gender <span color="red">*</span> </p> 
                            <select class="form-control" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>

                           
                    </div>

                    <div class="input-box">

                      <span class="icon"><ion-icon name="qr-code-outline"></ion-icon></span>
                      <input type="text"  name="code" minlength="5" autocomplete="off" placeholder=" Please don't forget this code!" maxlength="10" required pattern="^[a-zA-Z0-9!@#$%^&*()_+-=]{5,10}$" onfocusout="f1()"/>
                      <label>Recovery code <span color="red">*</span></label>

                    </div>

                    <div class="input-box">
                            <span class="icon"><ion-icon name="call"></ion-icon></span>
                            <input type="text"  name="mobile_number" autocomplete="off" placeholder="Country code +251" required pattern="^\+251\d{9}$" minlength="13" maxlength="13" id="mobno" onfocusout="f1()"/>
                            <label>Mobile <span color="red">*</span></label>
                    </div>
          
         

				          	<input type="submit" class="btn" value="Submit" name="s">
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