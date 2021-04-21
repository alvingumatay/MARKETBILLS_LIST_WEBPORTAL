<?php
  require_once './includes/logincheck.php';
?>
<?php include './includes/insert.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel = "shortcut icon" href = "../images/mosc-logo.png" />-->
<link rel = "shortcut icon" href = "../images/basket.jpg">
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
    
	    
    <div class = "panel panel-primary">
      <div class = "panel-heading">
        <label> CREATE ANNOUNCEMENTS !!! :</Label>
      </div>
      <div class = "panel-body">
     <a href="#addnew" data-toggle="modal"  style = "float:right; margin-right:10px;" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add New</a>
        <br />
        <br />
        <div class="table-responsive">
        <table id = "table" class = "display" width = "100%" cellspacing = "0">
          <thead>
            <tr>
               <th class="ik">#</th>
              <th class="ik">ANNOUNCEMENTS</th>
              <th class="ik">CONTROLS</th>
            </tr>
          </thead>
           <?php
            $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `postview`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
            
          ?>
          <tbody>
         
            <tr>
               <td class="pk"><?php echo $fetch['id']?></td>
             
              <td class="pk"><?php echo $fetch['message']?></td>
             
              <td class="pk">
                
                <a onclick="confirmationDelete(this);return false;" href = "delete.php?id=<?php echo $fetch['id']?>" class = "btn btn-sm btn-danger"> Delete <i class = "glyphicon glyphicon-trash"></i> </a>
              </td>   
             
            
            </tr>
          
          </tbody>
        <?php } ?>
          </table>
          </div>
      </div>
    </div>
   
            </div>
           </div>
           </div> 
	<!---modal  --->
	<?php include('./modal/show_add_modal.php');?>

  <!-- // -->



  <!---script -->

 <?php include("./includes/script.php"); ?>
  <!-- // -->
</body>
<script type = "text/javascript" src="../js/confirmdelete.js"></script>

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

















