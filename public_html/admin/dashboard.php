<?php
	require_once './includes/logincheck.php';
?>
 <?php include './includes/addimage.php'; ?>  
<?php 

 include "../includes/database.php";

 $query = "SELECT * FROM messenger ORDER BY id ASC";
 $shouts = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html>
<head>
<title>Admin || Panel</title>
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
  <style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
	
	<?php include('./includes/header.php');?>
 <div class="ts-main-content">
 <?php include('./includes/leftbar.php');?>
 <br/> <br/> <br/>  
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">

  		<!--- Messenger -->
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

	   <!-- // -->
	   <br/>
      <!-- DashBoard-->
	<div class = "panel panel-success">
			<div class = "panel-heading">
				<center><label>D A S H B O A R D</label></center>
			</div>

			<div class = "panel-body">
            <center>
				  <center>
				<div class="dash">
			       <a href="useraccount.php">
						<label style="background-color: darkblue; cursor: pointer;"><i class="glyphicon glyphicon-bell"></i>
							
							<?php 
	
								$qapp = $conn->query("SELECT COUNT(user_id) AS total FROM `users`") or die(mysqli_error());
								$fapp = $qapp->fetch_array();
								$num_rows = $fapp['total'];
					
								echo $num_rows;
							?>
							
						<span style="font-size: 13px;">
								User Accounts
							</span>
							<p  style="font-size: 17px;">Full Detail &nbsp; <i class="glyphicon  glyphicon-arrow-right" style="font-size:18px;"></i></p>
						</label>
					</a>
				</div>
                </center>
                </center>
			</div>
		</div>
		<!--- // --->
		
		<div class = "panel panel-warning">
      <a href="#addimage" data-toggle="modal"  style = "float:right; margin-right:10px; margin-top:
      5px;" class="btn btn-primary btn-sm "><span class="glyphicon glyphicon-plus"></span></a>
      <div class = "panel-heading">
        <label> Seasons and Holidays Features :</Label>
      </div>
      <div class = "panel-body">
          <?php
            $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `holiseason`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            ?>
   <input type="hidden" name="image" class="form-control" value="<?php echo $fetch["image"]; ?>">
   
      <center> 
         
        <img src="./images/<?php echo $fetch['image']; ?>" style="width:540px; margin:10px; float: none;">  </center>
      <?php
        }
         $conn->close();
        ?>

          </div>
      </div>
    </div>
        
        	
        <!---modal  --->
	<?php include('./modal/show_image_modal.php');?>
  <?php include('./modal/show_delete_modal.php');?>
  <!-- // -->



  <!---script -->

 <?php include("../includes/script.php"); ?>
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
