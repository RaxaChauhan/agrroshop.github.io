
      <link rel="stylesheet" href="../style/index.css" />
<div class="header_menu">
		
		
		<div class="menu_list">
			<ul>
				<li><a href="search.php">Home</a></li>

				<?php if(isset ($_SESSION['is_login']) ){ ?>
                        <li><a href="../logout.php">Logout</a></li>
                <?php } 
                    else{ ?>
                        <li><a href="../login.php">Login</a> </li>&nbsp;&nbsp;&nbsp;
                <?php } ?>

				
                        
             

             

				

				&nbsp;<a href="cart.php"><li><img src="../img/cart.png" style="height: 37px;margin-bottom: -14px;display: block; margin-left: 58%; position: sticky;"></li>
					<span style="color: #FFFFFD;display: block;    margin-left: 54%;margin-top: -11%;">My Cart</span><br>

					<?php 
					$u_id="";
					$count="0";
					if(isset ($_SESSION['is_login']) ){
							$u_id = $_SESSION['id'];
							
							$sql= "select * from cart where user_id= '$u_id' ";
							$res=mysqli_query($con,$sql);
							$count=mysqli_num_rows($res);	
					}
					?>
					<span style="background-color: #e02c2b;border-radius: 100%;color: white;font-size: 15px;display: block;margin:-10% 51%;height: 22%;width: 4%;line-height: 25px;text-align: center;"> <?php echo $count; ?></span>
				</a>
				
			</ul>
		</div>
	</div>