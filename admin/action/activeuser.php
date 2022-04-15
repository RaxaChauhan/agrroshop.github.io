<?php
	include '../../include/dbcon.php';


            $id = $_GET['id'];
            $status = $_GET['status'];
            $query = "update signup set status = '$status' where id = '$id'";
              mysqli_query($con,$query);
            header('location: ../user.php');
  
    
?>