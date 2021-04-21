<?php
            $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
            $query = $conn->query("SELECT * FROM `holiseason` WHERE `img_id`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
              ?>   
  <div id="addimage" class="modal fade" role="dialog"> 

      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     
                    
                </div>
                
                <div class="modal-body"> 
                <form method="post"  class="form-horizontal" enctype="multipart/form-data">
          <div class="row">
        
          <div class="col-lg-4">
          <label class="control-label" style="position: relative; top:7px;">Seasons</label>
         </div> 
          <input type="hidden" name="image" class="form-control" value="<?php echo $fetch["image"]; ?>">
      <center> 
        <div class="col-lg-4"> 
        <img src="./images/<?php echo $fetch['image']; ?>" style="width:300px; margin-right:10px;"> 
      </div>
      </center>
      
         <div class="col-lg-8">
         <br/><br/>
        <input type="file" name="image" class="form-control">
         </div>
         
          </div>
           <div class="modal-footer">
            
             <button type="submit"  name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>

             <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glypicon glypicon-remove"></span>Cancel</button>
             
           </div>
      </form>
      <?php
        }
         $conn->close();
        ?>
    </div> 


          

                   