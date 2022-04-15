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


        $c_id="";
        $detail="";
        $category="";
        $msg="";

        if(isset($_GET['c_id']) && $_GET['c_id']>0)
        {
            $c_id = $_GET['c_id'];
            $sql = "select * from category where c_id='$c_id'";
            $res = mysqli_query($con,$sql);

            $row = mysqli_fetch_assoc($res);
            $category = $row['category'];
            $detail = $row['detail'];
        }

        if(isset($_POST['submit']))
        {
            
            $category = $_POST['category'];
            $detail = $_POST['detail'];
            
            if($c_id=='')
            {
                $emailquery = "select * from category where category='$category'";
            }
            else
            {
                $emailquery = "select * from category where category='$category' and c_id!='$c_id'";
            }
            $query = mysqli_query($con,$emailquery);
            $emailcount = mysqli_num_rows($query);

                if($emailcount > 0)
                {
                    $msg="category already exists";
                }
                else
                {
                    if($c_id=='')
                    {
                        $insert="insert into category (`category`, `detail`) values('$category','$detail')";
                
                        mysqli_query($con,$insert) or die(mysqli_error($con));
                    }
                    else
                    {
                        $insert="update category set category= '$category', detail= '$detail' where c_id='$c_id'";
                
                        mysqli_query($con,$insert) or die(mysqli_error($con));
                    }

                
                    echo "submitted"; 
                    ?>
                            <script> 
                                location.replace("../category.php");
                            </script>
<?php

                }
        }


?>
        <div class="bg">
            <div class="formbox">
               
                    
            <h2><center style="margin-top: -12%;">Add category</center></h2>   
            <form  class="input-group" action="" method="POST" style="margin-left: -4%;">
                        <input style="padding-left: 7%;"type="text" class="input-field" name="category" placeholder="Category Name" required value="<?php echo $category ?>">
                        
                        <p style="font-size: 13;color: red;margin-left: -10px;"><?php echo $msg ?></p>
                        
                        <textarea style="padding-left: 7%;" class="input-field" placeholder="Details" name="detail" style="margin-top: 5%;"  ><?php echo $detail ?></textarea> 



                        <button type="submit" class="submit-btn" name="submit" style="margin-top: 12%;">Submit</button>
                    </form>
                
            </div>
        </div>

    </body>
</html>