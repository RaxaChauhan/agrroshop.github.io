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
   
    $sql= "select * from category order by c_id";
    $res= mysqli_query($con,$sql);
?>

    <h1>Category Management</h1> 
    <div class="card">
    <button><a href="include/addcategory.php"> Add </a></button>
      <div class="content">
      <table>
        <tr>
          <th>Sr.no</th>
          <th>Category</th>
          <th >Details</th>
          <th >Action</th>
        </tr>
      
        <?php if(mysqli_num_rows($res)>0) { 
          $i=1;
          while($row = mysqli_fetch_assoc($res)){
            
          ?>
        <tr>
      
          <td ><?php echo $i ?></td>
          <td ><?php echo $row['category'] ?></td>
          <td><?php echo $row['detail'] ?></td>
          <td>
          <span class="label edit"><a href="include/addcategory.php?c_id=<?php echo $row['c_id'];?>">Edit</a></span>
            &nbsp;
            <?php 
            $status =  $row['status'];
            if($status==1){ ?>
            <span class="label deactive"><a href="action/activecategory.php?c_id=<?php echo $row['c_id'];?>&status=0">Deactive</a></span>
            <?php } else { ?>
            <span class="label active"><a href="action/activecategory.php?c_id=<?php echo $row['c_id'];?>&status=1">Active</a></span>
          <?php } ?>
            &nbsp;
            <span class="label delete"><a href= "action/deletecategory.php?c_id=<?php echo $row['c_id']; ?>"> Delete</a></span>
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
  </div>
</body>
</html>