<?php
  session_start();
    include 'dbcon.php';
   include 'navbar.php';
   include 'constant.php';
 
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../admin/style/table.css">
</head>
<body>

<?php
if(isset ($_SESSION['is_login']) ){
  $total='0';
    $u_id = $_SESSION['id'];
    $sql= "select * from cart where user_id= '$u_id' ";
    $res= mysqli_query($con,$sql);



?>


    <h1 style=" margin-left: 45%;">My Cart</h1> 
    <div class="card" style="margin-top: -1%;margin-left: -19%;height: 71%;">

      <div class="content">
      <table>
        <tr>
          <th>Product</th>
          <th>Untill Price
              <br>Per Kg
          </th>
          <th>Quantity</th>
          <th>Unit</th>
          <th>Subtotal</th>
          <th >Action</th>
        </tr>
        <?php if(mysqli_num_rows($res)>0) { 
          
          while($row = mysqli_fetch_assoc($res)){
            $total = $total+$row['price'];
          ?>
            <tr><?php
                $p_id=$row['p_id'];
                $sql2= "select * from product where id= '$p_id' ";
                $res2= mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_array($res2);
            ?>
            <td><a target="_blank" href="<?php echo SITE_PRODUCT_IMAGE.$row2['image'] ?>"><img src="<?php echo SITE_PRODUCT_IMAGE.$row2['image'] ?>" style="height: 80px;width: 80px;"></td>
            <td><?php echo $row2['price'] ?></td> 

            <form action="../action/add_to_cart.php" method="POST">
                    <input type="hidden" name="p_id" value="<?php echo $row2['id'] ?>">
                    <input type="hidden" name="price" value="<?php echo $row2['price'] ?>">
                <td><input type="number" name="qty" value="<?php echo $row['qty'] ?>" style="width: 80px;" required></td>
                <td><select name="unit"  style="height: 21px;">
                    <option value="<?php echo $row['unit'] ?>" selected> <?php echo $row['unit'] ?> </option>
                    <option value="GM">GM </option>
                    <option value="KG">KG </option>
                    </select></td>
           

            <td ><?php echo $row['price'] ?></td>
            <td>
            <input type="submit" name="submit" value="Update" style="cursor: pointer;background-color: green;height: 29px;border: none;color: white;">
            <span class="label delete"><a href= "../action/delete_to_cart.php?id=<?php echo $row['id']; ?>" style="text-decoration:none;"> Delete</a></span>
            </td>
            </form>
        </tr>

      <?php

    }
     } else { ?>
        <tr>
        <td colspan="6">no data</td>
      </tr>
      <?php } ?>


    </table>

    </div>
  </div>
  <div style="width: 198px;border: 1px solid #3e403e;padding: 13px;margin-left: 80%;margin-top: -31%;">
    <b>Total Amount : <?php echo $total?> Rs.</b>
   <?php $_SESSION['total']="$total"; ?>
   
    <p><button onclick="window.location.href='search.php'" style="cursor: pointer;margin-left: 10%;height: 35px;width: 157px;background-color: green;border: 0;color: white;font-size: 16px;"> Continue Shopping</button></p>
    <p><button onclick="window.location.href='checkout.php'" style="cursor: pointer;margin-left: 16%;height: 35px;width: 138px;background-color: green;border: 0;color: white;font-size: 16px;"> CheckOut</button></p>
  </div>
  <?php } else{  ?>  <script> location.replace("../login.php");</script> <?php } ?>
</body>
</html>