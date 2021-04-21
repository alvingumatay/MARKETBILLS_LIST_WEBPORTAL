<?php
include('./includes/config.php');
if(isset($_POST['submit']))
{


$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$notitype='Create Account';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name,email, password) VALUES(:name, :email, :password)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>EGROCER-LIST</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<link rel = "shortcut icon" href = "./images/.png" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
<link href="src/style.css" rel="stylesheet" type="text/css" media="all" />
<!--modal script-->
 <script src="./js/bootstrap.min.js"></script>
 <!-- //  -->

</head>
<body>
    <header>
    	<div class="container">
    		<div id="branding">
    			<h1> 
                <span class="highlight">EGROCER-LIST</span>
                Listing Planner
    			</h1>
    		</div>
    		<nav>
    			<ul>
    				<li class="current"><a href="index.php"><span> <span> HOME </span> </span></a></li>
    				<!--<li><a href="about.php">ABOUT</a></li>-->
    				<!--<li><a href="services.php">SERVICES</a></li>-->
            <li><a href="#" name="login" id="login"  data-toggle="modal" data-target="#loginModal"> <span> <span> SIGNUP </span> </span> </a>
            <br/> <br/>
            </li>
    			</ul>
    		</nav>
      </div>
    </header>
       
        <div class="container">
          <br/>
         <div class="row">
          <center>
   <div class="card mx-auto" style="width: 26rem;">
  <div class="card-body">
     
        <div style="color: #156699;" class="panel-heading"><font size="27px;">Register</font></div>
        <div class = "panel-body">
        <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
         <div class="form-group" >
            <input type="text" name="name" style="font-size: 27px;" class="form-control form-control-lg" required="required" placeholder="Full Name">
            </div>
              <br/>
              <div class="form-group">
              <input type="email" name="email" style="font-size: 27px;" class="form-control form-control-lg" required="required" placeholder="Email">
              </div>
               <br/>
              <div class="form-group">
              <input type="password" name="password" style="font-size: 27px;" class="form-control form-control-lg" required="required" placeholder="Password">
              </div>
               <br/>
              <div class="form-group">
               <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Sign Up</button>
              </div>
        </form>
          </div>
       
        </div>
      </div>
    </center>
    </div>
         </div>
         <br/> <br/><br/><br/><br/><br/>
         <br/>
        
    <footer>
    	<p>EGROCER-LIST, Grocery Planner Marker  &copy; 2020</p>
    </footer>
</body>
</html>