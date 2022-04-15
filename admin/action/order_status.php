<?php
	include '../../include/dbcon.php';


            $id = $_GET['id'];
            $status = $_GET['status'];
            $query = "update order_data set order_status = '$status' where id = '$id'";
              mysqli_query($con,$query);
            header('location: ../order.php');
  
    
?>