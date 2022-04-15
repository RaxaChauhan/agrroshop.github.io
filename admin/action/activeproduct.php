<?php
	include '../../include/dbcon.php';


            $id = $_GET['id'];
            $status = $_GET['status'];
            $query = "update product set status = '$status' where id = '$id'";
              mysqli_query($con,$query);
           header('location: ../product.php');
  
    
?>