
<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'handler') {
    header("Location: home.php");
    exit();
}
?>





<meta http-equiv="refresh"  content="60;url=Handlerlogin.php">


<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="./Assets/css/HandlerHome.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<title>Handler Homepage</title>
<?php
  include("connection.php");
    // session_start();
    if(!isset($_SESSION['x']))
        header("location:Handlerlogin.php");
    
   
      
  $result1=mysqli_query($conn,"SELECT location FROM p_handler");
  $q2=mysqli_fetch_assoc($result1);
  $location=$q2['location'];
  
  if(isset($_POST['s2']))
  {
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
      $cid=$_POST['cid'];
      
      $_SESSION['cid']=$cid;
      $qu=mysqli_query($conn,"SELECT  inc_status,location From p_handler where c_id='$cid'");
      
      $q=mysqli_fetch_assoc($qu);
      $inc_st=$q['inc_status'];
      $loc=$q['location'];
      
      if(strcmp("$loc","$location")!=0)
      {
     
       header("location:Handler_complain_details.php");
        
      }
      else if(strcmp("$inc_st","Unassigned")==0)
      {   
          header("location:Handler_complain_details.php");
          
      }
      else{
          header("location:Handler_complain_details1.php");
      }
  }
  }
  
  $query="SELECT id_no,c_id,type_crime,d_o_c,repo_time_and_date,location,description,image_url,audio_url,video_url,inc_status,pol_status,p_id from p_handler order by c_id desc";
  $result=mysqli_query($conn,$query);  




  ?>

</head>
<body >



  <header>

<div class="leftside">
    <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
             <a href="Handlerlogin.php">Handler Login</a></li>
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="HandlerHome.php" class="active"> Handler Home </a>
       <a href="Handler_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

    <form class="forms" method="post">
      <input type="text" name="cid" class="txts" placeholder="&nbsp Complaint ID" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btns" type="submit" value="Search" name="s2"> 
        </div>
    </form>
    
    <div >
   <table class="table">
    <thead>
      <tr>

        <th scope="col">Registration ID</th>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Reported Time and Date </th>
        <th scope="col">Location</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Audio</th>
        <th scope="col">Video</th>
        <th scope="col">Case Status</th>
        <th scope="col">Police Status</th>
        <th scope="col">Police ID</th>
       
      </tr>
    </thead>

            <?php
              while($rows=mysqli_fetch_assoc($result)){

             ?> 

            <tbody>
      <tr>
      <td><?php echo $rows['id_no']; ?></td>
      <td><?php echo $rows['c_id']; ?></td>
      <td><?php echo $rows['type_crime']; ?></td>     
      <td><?php echo $rows['d_o_c']; ?></td>
      <td><?php echo $rows['repo_time_and_date']; ?></td>
      <td><?php echo $rows['location']; ?></td>
      <td><?php echo $rows['description']; ?></td>
      <td><a style='color:black;' href='Imageview.php?id=<?php echo $rows["c_id"]; ?>'>View Image</a></td> 
      <td><a style='color:black;' href='Audioview.php?id=<?php echo $rows["c_id"]; ?>'>View Audio</a></td> 
      <td><a style='color:black;' href='Videoview.php?id=<?php echo $rows["c_id"]; ?>'>View Video</a></td> 
      <td><?php echo $rows['inc_status']; ?></td>
      <td><?php echo $rows['pol_status']; ?></td>
      <td><?php echo $rows['p_id']; ?></td>

      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>

<?php
 include("footer.php");
?>

    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
     if(sta2!="" && x2>=0)
     {
        document.getElementById("ciid").value="";
        alert("Blank Field not Allowed");
      }       
}
</script>


 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>