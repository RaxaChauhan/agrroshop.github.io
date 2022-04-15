<?php
	include '../../include/dbcon.php';

    $c_id = $_GET['c_id'];

    $q = "DELETE FROM `category` WHERE c_id = $c_id";

    mysqli_query($con,$q);

    header('location: ../category.php');
?>