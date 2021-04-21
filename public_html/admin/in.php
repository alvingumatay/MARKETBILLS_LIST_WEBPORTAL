



<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_GET['del']) && isset($_GET['name']))
{
$id=$_GET['del'];
$name=$_GET['name'];

$sql = "delete from users WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

$sql2 = "insert into deleteduser (email) values (:name)";
$query2 = $dbh->prepare($sql2);
$query2 -> bindParam(':name',$name, PDO::PARAM_STR);
$query2 -> execute();

$msg="Data Deleted successfully";
}

if(isset($_REQUEST['unconfirm']))
  {
  $aeid=intval($_GET['unconfirm']);
  $memstatus=1;
  $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
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
  $sql = "UPDATE users SET status=:status WHERE  id=:aeid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();
  $msg="Changes Sucessfully";
  }
if(isset($_GET['reply']))
  {
  $replyto=$_GET['reply'];
  }   

  if(isset($_POST['submit']))
  { 
  $reciver=$_POST['email'];
    $message=$_POST['message'];
  $notitype='Send Message';
  $sender='Admin';
  
    $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
    $querynoti = $dbh->prepare($sqlnoti);
  $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
  $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
    $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
    $querynoti->execute();

  $sql="insert into feedback (sender, reciver, feedbackdata) values (:user,:reciver,:description)";
  $query = $dbh->prepare($sql);
  $query-> bindParam(':user', $sender, PDO::PARAM_STR);
  $query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
  $query-> bindParam(':description', $message, PDO::PARAM_STR);
    $query->execute(); 
  $msg="Feedback Send";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME BASED SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Slicebox - 3D Image Slider with Fallback" />
    <meta name="keywords" content="jquery, css3, 3d, webkit, fallback, slider, css3, 3d transforms, slices, rotate, box, automatic" />
    <meta name="author" content="Pedro Botelho for Codrops" />
    <link rel = "shortcut icon" href = "../images/ico.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
     <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="///fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">
    <link href="///fonts.googleapis.com/css?family=Federo" rel="stylesheet">
     <link href="///fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Bootstrap Datatables -->
  
    <!-- Bootstrap social button library -->
    
    <!-- Admin Stye -->
    <link rel="stylesheet" href="../css6/style.css">
<script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="../assets/css/style.css">
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
  <div id="overlay">
 <div  id="ring">
  Loading
  <span class="gud"></span>
</div>
</div>
  <?php include('./includes/header.php');?>
  <div class="ts-main-content">
  <?php include('./includes/leftbar.php');?>
  <div id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
    <img src="../images/cog2.gif" width="40px" height="40px">
   </div>
  <ul>
<center>
          <div class="panel panel-default">
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  <div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
  <label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
  <div class="col-sm-4">
  <input type="text" name="email" class="form-control"  required value="<?php echo htmlentities($replyto);?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Message<span style="color:red">*</span></label>
  <div class="col-sm-6">
  <textarea name="message" class="form-control" cols="30" rows="5"></textarea>
  </div>
</div>

<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

<div class="form-group">
  <div class="col-sm-8 col-sm-offset-2">
    <button class="btn btn-primary" name="submit" type="submit">Send Reply</button>
  </div>
</div>
</form>

    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">
               <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
            <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
            <option value=2029>2029</option>
            <option value=2030>2030</option>
        </select></form>
        </div>

            </tbody>
        </table>
         
   </div>
</div>
 </div>
</center>
  </ul> 
  </div>
 <div class="content-wrapper">
        <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <h2 class="page-title">Manage Users</h2>

            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">List Users</div>
              <div class="panel-body">
              <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th>#</th>
                        <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                               <th>Phone</th>
                                                <th>Address</th>
                                                <th>Account</th>
                      <th>Action</th> 
                    </tr>
                  </thead>
                  
                  <tbody>

<?php $sql = "SELECT * from  users ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><img src="../images/<?php echo htmlentities($result->image);?>" style="width:50px; border-radius:50%;"/></td>
                                            <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->email);?></td>
                                            <td><?php echo htmlentities($result->mobile);?></td>
                                            <td><?php echo htmlentities($result->address);?> 
                                            <td>
                                            
                                            <?php if($result->status == 1)
                                                    {?>
                                                    <a href="userlist.php?confirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a> 
                                                    <?php } else {?>
                                                    <a href="userlist.php?unconfirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
                                                    <?php } ?>
</td>
                                            </td>
                      
<td>
<a href="edit-user.php?edit=<?php echo $result->id;?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="userlist.php?del=<?php echo $result->id;?>&name=<?php echo htmlentities($result->email);?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
</td>
                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>    
</html>
<?php } ?>