<?php
    include '../include/dbcon.php';
    include 'include/side.php';
		session_start();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="style/table.css">
</head>
<body>

<?php
   
    $sql= "select * from order_data order by id";
    $res= mysqli_query($con,$sql);
?>

    
    <h1>Order Management</h1>
  <div class="card"> 
    <table>
      <tr>
        <th width="1%">User</th>
        <th width="1%">Phone</th>
        <th width="2%">Address</th>
		<th width="2%">Total Price</th>
		<th width="2%">Addon</th>
        <th width="1%">Action</th>
      </tr>
      
      <?php if(mysqli_num_rows($res)>0) { 
          $i=1;
          while($row = mysqli_fetch_assoc($res)){
            $u_id=$row['user_id'];
			$res2 = mysqli_query($con,"select * from signup where id='$u_id'");
			$row2 = mysqli_fetch_assoc($res2);
            
          ?>
      <tr>
      
        <td ><?php echo  $row2['f_name'];?></td>
        <td ><?php echo $row['mobile'] ?></td>
        <td><?php echo $row['address'] ?></td>
		<td><?php echo $row['total_price'] ?></td>
		<td><?php echo $row['addon'] ?></td>
        <td>

          <?php 
            $status =  $row['order_status'];
            if($status==1){ ?>
            <span class="label active"><a href="action/order_status.php?id=<?php echo $row['id'];?>&status=0">pending</a></span>
          <?php } else { ?>
            <span class="label deactive"><a href="action/order_status.php?id=<?php echo $row['id'];?>&status=1">Deliver</a></span>
          <?php } ?>
        </td>
      
      </tr>

      <?php
         $i++;  
    }
     } else { ?>
        <tr>
        <td colspan="5">no data</td>
      </tr>
      <?php } ?>

    </table>
  </div>
</body>
</html>