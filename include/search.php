<?php
    session_start();
    include "dbcon.php";
    include "constant.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title> home </title>
  <link rel="stylesheet" href="../style/section.css" />
  </head>
  <body>

    <section id="home">
    <?php include "navbar.php" ?>



<p><img src="../img/front.webp" style="margin-top: 5%;margin-left: 26%;width: 70%;height: 250px;"></p>

      <?php
         $cat_res = mysqli_query($con,"select * from category where status=1 order by c_id desc")
      ?>
      <div class="category-list"    style="margin-top: -26%;margin-left: 0%;">
      <h4>Shop By Categories</h4>
        <ul>
        <li> <a  href="search.php">All</a></li>
        <?php
          
          while($cat_row=mysqli_fetch_assoc($cat_res))

          {
            echo "<li> <a  href='search.php?cat_id=".$cat_row['c_id']."'>".$cat_row['category']."</a></li>";
          }
        ?>

        </ul>  
    </div>

        <?php

          $product_sql="select * from product where status=1";
          if(isset($_GET['cat_id']) && $_GET['cat_id']>0){
            $cat_id = $_GET['cat_id'];
            $product_sql.=" and category_id='$cat_id' ";
        }

          $product_res=mysqli_query($con,$product_sql);
          $product_count=mysqli_num_rows($product_res);
        ?>
            <?php include "menu.php" ?>

        <div class="flex-container">

              <?php if($product_count>0){ 

 

                 while($product_row = mysqli_fetch_assoc($product_res)) {  ?>

                  <div class="product-card" style="width:300px;">
                  
                      <img src="<?php echo SITE_PRODUCT_IMAGE.$product_row['image']?>" alt="Denim Jeans" style="width:100%;height: 300px;">
                      <h1><a href="javascript:void(0)"><?php echo $product_row['product'] ?></a></h1>
                      <p class="price">Per K.G. <?php echo $product_row['price'] ?>Rs.
                      <?php if(isset ($_SESSION['id'])){
                          $p_id = $product_row['id'];
                          $u_id = $_SESSION['id']; 
                          $res = mysqli_query($con,"select * from cart where user_id='$u_id' and p_id='$p_id'");
                          if(mysqli_num_rows($res)>0){
                              echo "<span style='color: red;font-size:14px;'>(added)</span>";
                          }
                      }?></p>
                      

                      <form action="../action/add_to_cart.php" method="POST" >
                        <input type="number" name="qty" placeholder="quantity" style="width: 80px;" required>
                        <input type="hidden" name="p_id" value="<?php echo $product_row['id'] ?>">
                        <input type="hidden" name="price" value="<?php echo $product_row['price'] ?>">
                        <select name="unit"  style="height: 21px;">
                            <option value="KG">KG</option>
                            <option value="GM">GM</option>                         
                        </select>
                        <p><button type="submit" name="submit" >Add to Cart</button></p>
                      </form>

                  </div>
                  
                <?php } 
              } else {
                    echo "NO DATA FOUND";
              }
              ?>

              
        </div>

    </section>

    <footer>  <h2>Darshna Bhayani & Chauhan Raxa</h2>	</footer>
    
  </body>
</html>


