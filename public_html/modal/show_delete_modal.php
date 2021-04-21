<div id="del<?php echo $fetch['id']; ?>" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">INFO</h4>
                     
                </div>
                
                <div class="modal-body"> 
                <div class="container-fluid">
      <h5><center>Do you want to delete <strong><?php echo $fetch['product_name']; ?>
        </strong></center></h5>
    </div></div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glypicon glypicon-remove">Cancel</span></button>
      <a href="delete.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
    </div>  
                 </div>
               </div>
             </div>

                   