<?php
    include '../include/dbcon.php';
    include 'include/side.php';
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style/table.css">
</head>
<body>

<?php
   
    $sql= "select * from signup order by id";
    $res= mysqli_query($con,$sql);
?>

    
    <h1>User Management</h1>
  <div class="card"> 
    <table>
      <tr>
        <th width="1%">Id</th>
        <th width="1%">User Name</th>
        <th width="2%">Email</th>
        <th width="1%">Action</th>
      </tr>
      
      <?php if(mysqli_num_rows($res)>0) { 
          $i=1;
          while($row = mysqli_fetch_assoc($res)){
            
          ?>
      <tr>
      
        <td ><?php echo $i ?></td>
        <td ><?php echo $row['f_name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td>

          <?php 
            $status =  $row['status'];
            if($status==1){ ?>
            <span class="label deactive"><a href="action/activeuser.php?id=<?php echo $row['id'];?>&status=0">Deactive</a></span>
          <?php } else { ?>
            <span class="label active"><a href="action/activeuser.php?id=<?php echo $row['id'];?>&status=1">Active</a></span>
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