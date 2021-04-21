<?php include '../includes/insert.php'; ?>
<div id="addnew" class="modal fade" role="dialog"> 
 <?php
        $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
        $q = $conn->query("SELECT * FROM `users` WHERE `user_id`='$_SESSION[user_id]'") or die(mysqli_error());
        $f = $q->fetch_array();
      ?> 
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     
                     <?php include '../includes/insert.php'; ?>  
                </div>
                
                <div class="modal-body"> 
                <form method="post"  class="form-horizontal" enctype="multipart/form-data">
          <div class="row">
          <div class="col-lg-4"> 
            <input  type="hidden" name="user_id" value="<?php echo $f['user_id']?>">
           <label class="control-label" style="position: relative; top:7px;">Select Product Image:</label>
           </div>  
          <div class="col-lg-8">
           <input class="form-control" type="file" name="image"/>
          </div>
          <div class="col-lg-4">
          <label class="control-label" style="position: relative; top:7px;">Product Name</label>
         </div> 
         <div class="col-lg-8">
          <input type="text" class="form-control" name="product_name">
         </div>
         <div class="col-lg-4">
          <label class="control-label" style="position: relative; top:7px;">Cost</label>
         </div> 
         <div class="col-lg-8">
          <input type="text" class="form-control" name="cost">
         </div>  
          </div>
           <div class="modal-footer">
            
             <button type="submit"  name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>

             <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glypicon glypicon-remove"></span>Cancel</button>
             
           </div>
      </form>
                   
                   </div>  
          

                   