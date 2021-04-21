<?php
	require_once '../includes/logincheck.php';
?>
<?php 

 include "../includes/database.php";

 $query = "SELECT * FROM messenger ORDER BY id ASC";
 $shouts = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "shortcut icon" href = "../images/basket.jpg">
 <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
 <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.min.css" />
 <link rel = "stylesheet" type = "text/css" href = "../css/style3.css" />
<link rel = "stylesheet" type = "text/css" href = "../css1/jquery.dataTables.css" />

 <link rel = "stylesheet" type = "text/css" href = "../css1/customize.css" />
 <link  rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
 
 <!-- Bootstrap Datatables -->
 <!-- Admin Stye -->
  <link rel="stylesheet" href="../css1/css1/style.css">
</head>
<body>
	<?php include('../includes/header.php');?>
 <div class="ts-main-content">
 <?php include('../includes/leftbar.php');?>
 <br/> <br/> <br/>  
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">

  			<div id="container">
		<header>
			<h1>MESSENGER || <i class="glyphicon glyphicon-bell"></i></h1>
		</header>
		<div id="shouts">
		<ul>
            <?php while($row = mysqli_fetch_assoc($shouts)):?>

			<li class="shout"><span><?php echo $row['time']?>- </span> <strong><?php echo $row['user']?></strong>: <?php echo $row['message']?></li>
			<?php endwhile; ?>
		</ul>
	</div>
    
    <div id="input">
    	<?php if(isset($_GET['error'])): ?>
        <div class="error"><?php echo $_GET['error'];?> </div>
    	<?php endif; ?>	
    	<form method="post" action="process.php">
    		<input type="text" name="user" placeholder="Enter Your Name"/>
            <input type="text" name="message" placeholder="Enter A Message"/>
            <br/>
            <input class="shout-btn" type="submit" name="submit" value="Shout Now" />


    	</form>
    	
    </div>
	</div>
    <br/> <br/>
      <!-- DashBoard-->
	<div class = "panel panel-success">
			<div class = "panel-heading">
				<center><label>D A S H B O A R D</label></center>
			</div>

			<div class = "panel-body">
            <center>
				 <div class="dash">
			       <a href="eGrocer-List.php">
						<label style="background-color: darkblue; cursor: pointer;"><i class="glyphicon glyphicon-bell"></i>
							
							<?php 
	
								$qapp = $conn->query("SELECT COUNT(user_id) AS total FROM `planbill` where `user_id`='$_SESSION[user_id]'") or die(mysqli_error());
								$fapp = $qapp->fetch_array();
								$num_rows = $fapp['total'];
					
								echo $num_rows;
							?>
							
						<span style="font-size: 13px;">
								Plan Bill Counts
							</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
					</a>
				</div>
                </center>
                
			</div>
		</div>
		<br/> 
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<center><label> INFO - HEADINGS </label></center>
			</div>

			<div class = "panel-body">
            <center>
				 <div class="dash">
			       <a href="eGrocer-List.php">
						<label style="background-color: darkblue; cursor: pointer;"><i class="glyphicon glyphicon-info-sign"></i>
							
						
							
						<span style="font-size: 30px;">
								Anouncements // Reminders
							</span>
							<?php
            $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `postview`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            
          ?>
     <br />
        <br /> <br/> 
        <marquee><p> <font color="white"><font size="5px"><?php echo $fetch['message']?></font></font></p></marquee>

         <?php } ?>
							<br/> 
							
						</label>
                       
                   </a>
				</div>
                </center>
                
			</div>
		</div>


		
		<!--- // --->
        
        		<!--- Messenger -->


	   <!-- // -->

		<hr />
        </div>
        </div>
        </div>
        </div> 
	
	
</body>
<script>
        function toggleSidebar(){
            document.getElementById("sidebar").classList.toggle('active');
        }
   </script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script src="../js2/jquery.min.js"></script>
  <script src="../js2/bootstrap-select.min.js"></script>
  <script src="../js2/bootstrap.min.js"></script>
  <script src="../js2/jquery.dataTables.min.js"></script>
  <script src="../js2/dataTables.bootstrap.min.js"></script>
  <script src="../js2/Chart.min.js"></script>
  <script src="../js2/fileinput.js"></script>
  <script src="../js2/chartData.js"></script>
  <script src="../js2/main.js"></script>
  <script src="../js/script.js"></script> 
  <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
 <script type="text/javascript">
  $(window).load(function(){
      $("#overlay").delay(2000).fadeOut("slow");
      
  });
</script>   
</html>
