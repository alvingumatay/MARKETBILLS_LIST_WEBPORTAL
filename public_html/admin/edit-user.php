<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}
if(isset($_POST['submit']))
  {
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$idedit=$_POST['idedit'];
	$sql="UPDATE users SET name=(:name), email=(:email)  WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg="Information Updated Successfully";
   }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title></title>
	<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel = "shortcut icon" href = "../images/mosc-logo.png" />-->
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
	<?php
		$sql = "SELECT * from users where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	<?php include('./includes/header.php');?>
 <div class="ts-main-content">
 <?php include('./includes/leftbar.php');?>
 <br/> <br/> <br/>  
  <div class="content-wrapper">
  <div class="container-fluid">
  <div class="row">
      <!-- Edit-User-->
						<div class="col-md-18">
						<div class="row">
							<div class="col-md-18">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
<div class="form-group">
<label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name);?>">
</div>
<label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
<div class="col-md-5">
<input type="email" name="email" class="form-control" required value="<?php echo htmlentities($result->email);?>">
<input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >
</div>
</div>
<div class="form-group">
	<div class="col-md-8 col-sm-offset-2">
		<button class="btn btn-success pull-right"  name="submit" type="submit">Save Changes</button>
	</div>
</div>

</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>


	   <!-- // -->
        
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
<?php } ?>
