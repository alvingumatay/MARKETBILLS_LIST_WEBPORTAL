<div class="brand clearfix">
<div class = "navbar navbar-default navbar-fixed-top" style="background-color: #156699;">
          <span class="menu-btn"><i class="fa fa-bars"></i></span>
		<!--<img src = "../images/mosc-logo.png" style = "float:left;" height = "55px" />-->
        <label class = "navbar-brand" style="font-size: 26px;">eGrocery List PLan 
		
		</label>
           
			<?php
				$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `users` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			
		<ul class="ts-profile-nav">
		<li class="ts-account">
           <a href="#">
            <?php 
              echo $f['name'];
            ?>
            <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href = "#">Change Password</a></li>
					<li><a href="logout.php">  Logout</a></li>
				</ul>
			</li>
		</ul>
		
	</div>
    </div>