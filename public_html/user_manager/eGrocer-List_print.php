<!DOCTYPE html>
<html>
<head>
	<style>
		@media print{
			@page{
				size: 8.5in 8in;
			}
		}
		#print{
			border:2px solid #000;
			overflow:hidden;
			width:850px;
			height:360px;
			margin:auto;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `planbill`  WHERE `id` ") or die(mysqli_error());
			$f = $q->fetch_array();
		?>		
<button class=" btn btn-success" onclick="printContent('print')"> <span class = "glyphicon glyphicon-print"> Print</button>
<button><a style = "text-decoration:none; color:#000;" href = "eGrocer-List.php" class = "btn btn-info"> Back</a></button>

<br />
   
	<div id="print">
         
         <br/>
		<div style = "margin:60px;">
            
			<br />
			<center>
			   <table width ="30px;" class="table table-border " style="display: inline-block;">
			    	<tr>
			    	<th >
				<center><h2>E - GroceryPLan - List</h2></center>
				     </th>

				     <tr/>
                      <tr>
                      	
				     <th><label style = "font-size:16px;"><b>PRODUCT NAME</b></label></th>
				     <th><label style = "font-size:16px;"><b>ITEM NO.</b></label></th>
				     <th><label style = "font-size:16px;"><b>COST</b></label> </th>
				      </tr>
                    <tr>
			      <td>
				    <?php 
							if($f['product_name'] == ""){
								
							}else{
								echo "<b>".$f['product_name']."</b>";
							}
						?>
				      </td>
				      <td>
				
				
						<?php 
							if($f['item_no'] == ""){
								
							}else{
								echo "<b>".$f['item_no']."</b>";
							}
						?>
				
				     </td>
				
				
			          <td>
				
						<?php 
							if($f['cost'] == ""){
								
							}else{
								echo "<b>".$f['cost']."</b>";
							}	
						?>
					</td>
				</tr>
				
			</table>
		</center>

		</div>
	</div>
</div>
</div>
</span>
</a>
</button>
</body>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>