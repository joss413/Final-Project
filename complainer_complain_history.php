<!DOCTYPE html>
<html>
<head>
       
	<title>Complaint History</title>
    
    <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/complainer-complain-history.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <?php
    include("connection.php");
    session_start();
    
    
    
    if(!isset($_SESSION['x']))
    header("location:userlogin.php");
    
        $u_id=$_SESSION['u_id'];
        $result1=mysqli_query($conn,"SELECT id_no FROM user where u_id='$u_id'");
      
        $q2=mysqli_fetch_assoc($result1);
        $id_no=$q2['id_no'];
    
    
    
    
    if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            
            $cid=$_POST['cid'];

            $_SESSION['cid']=$cid;
            
            $resu=mysqli_query($conn,"SELECT id_no FROM complaint where c_id='$cid'");
            $qn=mysqli_fetch_assoc($resu);
                
            
           if($qn['id_no']==$q2['id_no'])
           {
                 header("location:complainer_complain_details.php"); 
           }
            else
            {
              $message = "Not Your Case";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
    
    
    
    $query="select c_id,type_crime,d_o_c,location from complaint where id_no='$id_no' order by c_id desc";
    $result=mysqli_query($conn,$query);  
    ?>
 
    <script>
     function f1()
        {
          
            var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
  
            if(sta2!="" && x2>=0)
            {
                  document.getElementById("ciid").value="";
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
            
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="complainer_page.php">Log New Complain</a>
       <a href="complainer_complain_history.php" class="active"> Complaint History</a>
       <a href="Taker_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>


    
        <form class="forms"  method="post">
            <input class="txts" type="text" name="cid"  placeholder="&nbsp Complain Id" id="ciid" onfocusout="f1()" required>
             <div>
            <input class="btns" type="submit" value="Search"  name="s2">
              </div>
        </form>
    


        <table class="table">
    <thead>
        <tr>
            <th scope="col">Complaint Id</th>
            <th scope="col">Type of Crime</th>
            <th scope="col">Date of Crime</th>
            <th scope="col">Location of Crime</th>
        </tr>
    </thead>
    <?php while($rows=mysqli_fetch_assoc($result)){ ?>
    <tbody>
        <tr>
            <td><?php echo $rows['c_id']; ?></td>
            <td><?php echo $rows['type_crime']; ?></td>
            <td><?php echo $rows['d_o_c']; ?></td>
            <td><?php echo $rows['location']; ?></td>
        </tr>
    </tbody>
    <?php } ?>
</table>

<?php
include("footers.php");
?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>