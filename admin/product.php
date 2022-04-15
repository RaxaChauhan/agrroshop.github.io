<?php
    include '../include/dbcon.php';
    include '../include/function.php';
    include '../include/constant.php';
   include 'include/side.php';
    
    //echo prx(SERVER_PRODUCT_IMAGE);
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
   
    $sql= "select product.*,category.category from product,category where product.category_id=category.c_id order by product.id desc";
    $res= mysqli_query($con,$sql);
?>

    <h1>Product Management</h1> 
    <div class="card">
    <button><a href="include/addproduct.php"> Add </a></button>
      <table>
        <tr>
         <th >Sr.no</th>
         <th >category</th>
         <th >Product</th>

         <th >Image</th>
         <th >Price<br>(Per K.G.)</th>
         <th >Action</th>
        </tr>
      
        <?php if(mysqli_num_rows($res)>0) { 
          $i=1;
          while($row = mysqli_fetch_assoc($res)){
            
          ?>
        <tr>
      
         <td ><?php echo $i ?></td>
        <td ><?php echo $row['category'] ?></td>
        <td><?php echo $row['product'] ?></td>

        
        <td><a target="_blank" href="<?php echo SITE_PRODUCT_IMAGE.$row['image'] ?>"><img src="<?php echo SITE_PRODUCT_IMAGE.$row['image'] ?>" style="height: 80px;width: 80px;"></a></td>

        <td><?php echo $row['price'] ?> Rs.</td>

         <td>
        <span class="label edit"><a href="include/addproduct.php?id=<?php echo $row['id'];?>">Edit</a></span>
            &nbsp;
          <?php 
            $status =  $row['status'];
            if($status==1){ ?>
            <span class="label deactive"><a href="action/activeproduct.php?id=<?php echo $row['id'];?>&status=0">Deactive</a></span>
          <?php } else { ?>
            <span class="label active"><a href="action/activeproduct.php?id=<?php echo $row['id'];?>&status=1">Active</a></span>
          <?php } ?>
            &nbsp;
            <span class="label delete"><a href= "action/deleteproduct.php?id=<?php echo $row['id']; ?>"> Delete</a></span>
        </td>
      
        </tr>

      <?php
         $i++;  
      }
     } else { ?>
        <tr>
        <td colspan="7">no data</td>
      </tr>
      <?php } ?>

      </table>
    </div>
</body>
</html>