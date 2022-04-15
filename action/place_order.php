<?php
        session_start();
        include '../include/dbcon.php';



            if(isset($_POST['submit'])){

                $total_price=$_SESSION['total'];
                $u_id = $_SESSION['id'];
                $address= $_POST['address'];
                $mobile= $_POST['mobile'];



                $res = mysqli_query($con,"select * from signup where id='$u_id'");


                    $row = mysqli_fetch_assoc($res);
                    $name = $row['f_name'];
                    $email = $row['email'];
                    
                    $sql="insert into order_data (user_id, mobile, address, total_price, payment, order_status) values 
                     ('$u_id', '$mobile', '$address', '$total_price', 'pending', '1')";
                    mysqli_query($con,$sql);

                     $insert_id= mysqli_insert_id($con);

                $res2 = mysqli_query($con,"select * from cart where user_id='$u_id'");
                while($row2= mysqli_fetch_assoc($res2)){
                    $p_id= $row2['p_id'];
                    $price = $row2['price'];

                     $sql2="insert into order_detail (order_id, p_id, price) value ('$insert_id','$p_id','$price')";
                    mysqli_query($con,$sql2);
                }

                $delete = mysqli_query($con,"DELETE FROM `cart` WHERE user_id='$u_id'");

                ?>  <script>
                    alert("THANK YOU");
                    location.replace("../include/search.php"); 
                </script> <?php

            }

?>