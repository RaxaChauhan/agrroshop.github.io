<?php
	session_start();
    include "../include/dbcon.php";
	include "../include/navbar.php";
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title> my order </title>
    <link rel="stylesheet" href="../admin/style/table.css">
  </head>
  <body>

    <section id="home">
<?php
if(isset ($_SESSION['is_login']) ){
    $u_id = $_SESSION['id'];
    $sql= "select * from order_data where user_id= '$u_id' ";
    $res= mysqli_query($con,$sql);

?>


    <h1 style=" margin-left: 45%;">My order</h1> 
    <div class="card" style="margin-top: -1%;margin-left: -19%;height: 71%;">

      <div class="content">
      <table>
        <tr>



          <th>totalprice</th>
		  <th>status</th>

        </tr>
		<tr>

		
        <?php if(mysqli_num_rows($res)>0) { 
          
          while($row = mysqli_fetch_assoc($res)){ ?>
		  
				<td ><?php echo $row['total_price'] ?></td>
				<?php $status=$row['order_status'];
				if($status==1){ ?>
					<td >Pending</td>
				<?php } else {
          ?><td >Delivered</td><?php } ?>


			</tr>

      <?php
		}
    
     } else { ?>
        <tr>
        <td colspan="6">no data</td>
      </tr>
      <?php } 
      
} else {
    echo "you are not login";
} ?>


    </table>

    </div>
  </div>
  

</body>
</html>