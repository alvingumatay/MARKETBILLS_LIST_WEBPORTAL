<?php
  require_once './includes/logincheck.php';
?>
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
</head>
<body>
	<?php include('./includes/header.php');?>
 <div class="ts-main-content">
 <?php include('./includes/leftbar.php');?>
 <br/> <br/> <br/>  
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
      <!-- DashBoard-->
<div class="panel panel-default">
<div class="panel-heading"> Status</div>
  <div class="panel-body">
  <div class="table-responsive">
    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
      <tr>
      <th>#</th>                 
      <th>Product Image</th>
      <th>Product name</th>
      <th>Cost</th>
      
      </tr>
      </thead>
      <tbody>
       <?php
      $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
      $query = $conn->query("SELECT * FROM planbill ") or die(mysqli_error());

      while($fetch = $query->fetch_array()){
        ?> 
         <tr>
          <td ><?php echo $fetch['prod_id'] ?></td>
          <td class="pk"><img src="../uploads/<?php echo $fetch['image']; ?>" width="190px" height="190px" style="border:1px solid #333333;"></td>
          <td ><?php echo $fetch['product_name'] ?></td>
          <td ><?php echo $fetch['cost'] ?></td>

         </tr>
         <?php
            }
            $conn->close();
          ?>
              
      </tbody> 
      </table>              
       </div>
     </div>
       </div>
                               
                            

		<!--- // --->
        
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
