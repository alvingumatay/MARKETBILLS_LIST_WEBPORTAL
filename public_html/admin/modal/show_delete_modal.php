<!-- Delete -->
    <div class="modal fade" id="delete<?php echo $row['img_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
                <?php
                    $del=mysqli_query($conn,"select * from holiseason where img_id='".$row['img_id']."'");
                    $drow=mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5><center>Are you sure to delete <strong><?php echo $row['image']; ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['img_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
                
            </div>
        </div>
    </div>