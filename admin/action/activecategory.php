<?php
	include '../../include/dbcon.php';


            $c_id = $_GET['c_id'];
            $status = $_GET['status'];
            $query = "update category set status = '$status' where c_id = '$c_id'";
              mysqli_query($con,$query);
            header('location: ../category.php');
  
    
?>