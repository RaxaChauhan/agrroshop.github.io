<?php
    include '../../include/dbcon.php';
    include '../../include/function.php';
    include '../action/constant.php';
?>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="../../style/mystyle.css">
    </head>

    <body>
<?php
        
        $id="";
        $category_id="";
        $p_detail="";
        $product="";
        $image="";
        $price="";
        $msg="";
        $image_status="required";

        if(isset($_GET['id']) && $_GET['id']>0)
        {
            $id = $_GET['id'];
            $sql = "select * from product where id='$id'";
            $res = mysqli_query($con,$sql);

            $row = mysqli_fetch_assoc($res);
            $category_id = $row['category_id'];
            $product = $row['product'];
            $p_detail = $row['p_detail'];
            $image = $row['image'];
            $image_status="";
            $price = $row['price'];
        }

        if(isset($_POST['submit']))
        {
            $category_id = $_POST['category_id'];
            $product = $_POST['product'];
            $p_detail = $_POST['p_detail'];
            $price = $_POST['price'];
            
            if($id=='')
            {
                $productquery = "select * from product where product='$product'";
            }
            else
            {
                $productquery = "select * from product where product='$product' and id!='$id'";
            }
            $query = mysqli_query($con,$productquery);
            $productcount = mysqli_num_rows($query);

                if($productcount > 0)
                {
                    $msg="product already exists";
                }
                else
                {
                    if($id=='')
                    {
                        $image = $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PRODUCT_IMAGE.$image);

                        $insert= " insert into product (category_id,product,p_detail,image,price) values ('$category_id','$product','$p_detail','$image','$price') ";
                        mysqli_query($con,$insert) or die(mysqli_error($con));
                    }
                    else
                    {
                        $image_condition = '';
                        if($_FILES['image']['name'] != '')
                        {
                            $image = $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'],SERVER_PRODUCT_IMAGE.$image);
                            $image_condition = ", image = '$image' ";
                            $oldimagerow = mysqli_fetch_assoc(mysqli_query($con,"select image from product where id='$id'"));
                            $oldimage = $oldimagerow['image'];
                            unlink(SERVER_PRODUCT_IMAGE.$oldimage);
                        }
                        $insert="update product set category_id= '$category_id', product= '$product', p_detail= '$p_detail', price= '$price' $image_condition  where id='$id'";
                
                        mysqli_query($con,$insert) or die(mysqli_error($con));
                    }

                
                    echo "submitted"; 
                    ?>
                            <script> 
                              
                                location.replace("../product.php");
                            </script>
<?php

                }
        }
        $res_category = mysqli_query($con,"select * from category where status='1' order by category ")  
?>
        <div class="bg">
            <div class="formbox" style="width: 228px;height: 324px;margin-top: 43px;">
               
                    
            <h2><center style="margin-top: -12%;">Add product</center></h2>   
            <form  class="input-group" action="" method="POST" enctype="multipart/form-data" style="margin-left: -4%;padding-left: 5%;">
                        <input type="text" class="input-field" name="product" placeholder="Product Name" required value="<?php echo $product ?>">
                        <p style="font-size: 13;color: red;margin-left: -10px;"><?php echo $msg ?></p>

                        <textarea class="input-field" placeholder="p_details" name="p_detail" style="margin-top: 5%;"  ><?php echo $p_detail ?></textarea>
                        
                        <label for="image" style="font-size: 12px;margin: -10px;color: gray;">Product image</label>
                        <input type="file" class="input-field" name="image" placeholder="Product Image" <?php echo $image_status ?> style="margin-top: -5px;color: gray;">

                        <label>Rs.</label><input type="text" class="input-field" name="price" placeholder="Price Per Kilogram" required value="<?php echo $price ?>">

                        <select class="input-field" placeholder="category" name="category_id" style="color: gray;">
                                <option value="">---Select Caregory---</option>
                            <?php
                                while($row_category = mysqli_fetch_assoc($res_category))
                                {
                                        if($row_category['c_id'] == $category_id){
                                            echo " <option value=".$row_category['c_id']." selected> ".$row_category['category']." </option>";
                                        }
                                        else{
                                            echo " <option value=".$row_category['c_id']."> ".$row_category['category']." </option>";
                                        }
                                }
                            ?>
                        </select>

                        
                        <button type="submit" class="submit-btn" name="submit" style="margin-top: 12%;">Submit</button>
                    </form>
                
            </div>
        </div>

    </body>
</html>