
 <meta http-equiv="refresh" content="60;url=userlogin.php">  
<!DOCTYPE html>
<html>
 
<?php
include("connection.php");
session_start();
    if(!isset($_SESSION['x'])){
        header("location:userlogin.php");
    $u_id=$_SESSION['u_id'];
        
        $result=mysqli_query($conn,"SELECT id_no FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result);
        $id_no=$q2['id_no'];
    
        $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result1);
        $u_name=$q2['u_name'];
    
    
if(isset($_POST['s'])){

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        
        $location=$_POST['location'];
        $type_crime=$_POST['type_crime'];
        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];
        $image_url=$_POST['myimage'];
        $audio_url=$_POST['myaudio'];
        $video_url=$_POST['myvideo'];
        
        $var=strtotime(date("Ymd"))-strtotime($d_o_c);
        
        
    if($var>=0)
    {
          
      $comp="insert into complaint(id_no,location,type_crime,d_o_c,description,image_url,audio_url,video_url) values('$id_no','$location','$type_crime','$d_o_c','$description','$image_url',' $audio_url', '$video_url')";
      
      $res=mysqli_query($conn,$comp);
      
      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }


}
    
    }

?>
    
 <script>
     function f1()
        {
           var sta1=document.getElementById("desc").value;
           var x1=sta1.trim();
          if(sta1!="" && x1==""){
          document.getElementById("desc").value="";
          document.getElementById("desc").focus();
          alert("Space Found");
        }
}
 </script>
   
<head>
	<title>Complainer Home Page</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body style="background-size: cover;
    background-image: url(pictures/insertpart.jpg);
    background-position: center;">
	<nav  class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b> On_The_Go Incident Reporter </b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="userlogin.php">User Login</a></li>
        <li class="active"><a href="complainer_page.php">User Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
        <li><a href="complainer_complain_history.php">Complaint History</a></li>
        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
    
    
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p><h2 style="color:white">Welcome <?php echo "$u_name" ?></h2></p><br>
                                    <p><h2>Log New Complain</h2></p><br>	
				<form action="#" method="post" style="color: gray">ID Number
					<input type="text"  name="ID_number" placeholder="ID Number" required="" disabled value=<?php echo "$id_no"; ?>>
					
				<div class="top-w3-agile" style="color: gray">Location of Crime
                    
             <select class="form-control" name="location">
						
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
				</div>
				<div class="top-w3-agile" style="color: gray">Type of Crime
					<select class="form-control" name="type_crime">
						<option>Theft</option>
						<option>Robbery</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
				    </select>
				</div>
					<div class="Top-w3-agile" style="color: gray">
					Date Of Crime : &nbsp &nbsp  
						<input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
					</div>
					<br>
					<div class="top-w3-agile" style="color: gray">
					Description
						<textarea  name="description" rows="20" cols="50" placeholder="Describe the incident in details with time" onfocusout="f1()" id="desc" required="" ></textarea>
					</div>

          <div class="top-w3-agile" style="color: gray">
					Upload Image
						<input type="file" name="myimage" placeholder="Please Upload an image"   ></input>
					</div>

          <div class="top-w3-agile" style="color: gray">
					Upload Audio
						<input type="file" name="myaudio" placeholder="Please Upload an Audio"   ></input>
					</div>

          <div class="top-w3-agile" style="color: gray">
					Upload Video
						<input type="file" name="myvideo" placeholder="Please Upload a Video"   ></input>
					</div>
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	
</dov
<?php

include("footer.php");
?>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>