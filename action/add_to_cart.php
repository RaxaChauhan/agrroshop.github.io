<?php
        session_start();
        include '../include/dbcon.php';

        if(isset ($_SESSION['is_login']) ){

            if(isset($_POST['submit'])){

                $u_id = $_SESSION['id'];
                $p_id= $_POST['p_id'];
                $price= $_POST['price'];
                $qty= $_POST['qty'];
                $unit= $_POST['unit'];



                $kg = "KG";
                if($unit == $kg){
                    
                    $n_price = $qty * $price / 1;
                }
                else
                {
                    $n_price = $qty * $price / 1000;
                }

                $res = mysqli_query($con,"select * from cart where user_id='$u_id' and p_id='$p_id'");
                if(mysqli_num_rows($res)>0){

                    $row = mysqli_fetch_assoc($res);
                    $cart_id = $row['id'];
                    mysqli_query($con,"update cart set price= '$n_price', qty= '$qty', unit= '$unit' where id='$cart_id'");
                    ?>  
                    <script>
                    alert("ITEM UPDET SUCCESFULLY");
                    location.replace("../include/cart.php"); 
                    </script> 
                    <?php
                }
                else{

                     mysqli_query($con,"insert into cart (user_id, p_id, price, qty, unit) values ('$u_id', '$p_id', '$n_price', '$qty', '$unit')");
                     ?>  
                     <script>
                         alert("ITEM ADDED SUCCESFULLY");
                        location.replace("../include/search.php"); 
                    </script> 
                    <?php
                }
            }
        }
        else{
            ?>  <script>
                    alert("you are not login");
                    location.replace("../login.php"); 
                </script> <?php
        }
?>
            


