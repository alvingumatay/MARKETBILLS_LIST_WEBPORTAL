<?php
  require_once './includes/logincheck.php';
?>
<?php
include('includes/config.php');

if(isset($_REQUEST['unconfirm']))
  {
  $aeid=intval($_GET['unconfirm']);
  $memstatus=1;
  $sql = "UPDATE users SET status=:status WHERE  user_id=:aeid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();
  $msg="Changes Sucessfully";
  }

  if(isset($_REQUEST['confirm']))
  {
  $aeid=intval($_GET['confirm']);
  $memstatus=0;
  $sql = "UPDATE users SET status=:status WHERE  user_idid=:aeid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();
  $msg="Changes Sucessfully";
  }





 ?>
<?php include '../includes/insert.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel = "shortcut icon" href = "../images/mosc-logo.png" />-->
 <link rel = "stylesheet" type = "text/css" href = "../css1/bootstrap.css" />
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
 <br/> <br/> 
  <div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
              <div class="col-md-12">

            <h2 class="page-title">Manage Users</h2>

            <!-- Zero Configuration Table -->

            <div class="panel panel-default">
              <div class="panel-heading">List Users</div>
              <div class="panel-body">
              <div class="table-responsive">  
              <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th>#</th>
                        
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Account</th>
                      <th>Action</th> 
                    </tr>
                  </thead>
                  
                  <tbody>
              <?php
            $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM users ") or die(mysqli_error());

            while($fetch = $query->fetch_array()){
             ?>

                    <tr>
                      <td ><?php echo $fetch['user_id'] ?></td>
                      <td><?php echo $fetch['name'] ?></td>
                                            <td><?php echo $fetch['email'] ?></td>
                                            
                                            <td>
                                            
                                             <label class="label label-success"><?php if($fetch['status'] == 1)

                                                    {?>
                                                    <a href="useraccount.php?confirm=<?php echo $fetch['user_id']?>" onclick="return confirm('Do you really want to Un-Confirm the Account')"> <font color="white"> Confirmed <i class="fa fa-check-circle"></i> </font></a> 
                                                    <?php } else {?>
                                                    <a href="useraccount.php?unconfirm=<?php echo $fetch['user_id']?>" onclick="return confirm('Do you really want to Confirm the Account')"> <font color="white"> Un-Confirmed <i class="fa fa-times-circle"></i> </font></a>
                                                    <?php } ?>
                                                  </label>
</td>
                                            </td>
                      
<td>
<a href="edit-user.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="useraccount.php?del=<?php echo $result->id;?>&name=<?php echo htmlentities($result->email);?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
</td>
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
          </div>
    </div>
	   </div>
           </div>
           </div> 
	<!---modal  --->
	<?php include('../modal/show_add_modal.php');?>
  <!-- // -->



  <!---script -->

 <?php include("../includes/script.php"); ?>
  <!-- // -->
</body>

<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script src="../js2/jquery.min.js"></script>
  <script src="../js2/bootstrap-select.min.js"></script>
  <script src="../js2/bootstrap.min.js"></script>
  <script src="../js2/jquery.dataTables.min.js"></script>
  <script src="../js2/dataTables.bootstrap.min.js"></script>
  <script src="../js2/fileinput.js"></script>
 <script src="../js2/main.js"></script>
  <script src="../js/script.js"></script> 
  
   <script type="text/javascript">
         $(document).ready(function () {          
          setTimeout(function() {
            $('.succWrap').slideUp("slow");
          }, 3000);
          });
  </script>
</html>
















