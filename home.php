<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../on_the_go incident reporter/Assets/css/home.css">
	  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	 <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <title>Home Page</title>
</head>
<body>
    
        <header>
         <a href="home.php"> <img class="pic" src="./Assets/pictures/logos.png" alt="Addis Ababa police commission logo"  ></a>
         
         
         <nav class="navigation">
            
            <a href="home.php" class="active"> Home </a>
            <a href="userlogin.php"> User Login </a>
            <a href="official_login.php"> Offical Login </a>
            <a href="About page.php"> About Us</a>
           
        
       
         </nav>   
        </header>

        
        
        <div class="container">
        <span class="text first-text"> </span>
        <span class="text sec-text"> </span>
        </div>

    <script>

      const texts = document.querySelector(".first-text");

        const textLoads = () => {
            setTimeout(() => {
                texts.textContent = " Welcome To ";
            }, 0);
            setTimeout(() => {
                texts.textContent = " Please feel free ";
            }, 10000);
            setTimeout(() => {
                texts.textContent = " For more Information ";
            }, 20000); //1s = 1000 milliseconds
        }

        textLoads();
        setInterval(textLoads, 30000);

    


        const text = document.querySelector(".sec-text");

        const textLoad = () => {
            setTimeout(() => {
                text.textContent = "  On_The_Go Incident Reporter";
            }, 0);
            setTimeout(() => {
                text.textContent = "to use our Page!!!";
            }, 10000);
            setTimeout(() => {
                text.textContent = " Call 991";
            }, 20000); //1s = 1000 milliseconds
        }

        textLoad();
        setInterval(textLoad, 30000);





    </script>    


 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</body>
</html>
