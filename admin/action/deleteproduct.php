<?php
	include '../../include/dbcon.php';

    $id = $_GET['id'];

    $q = "DELETE FROM `product` WHERE id = $id";

    mysqli_query($con,$q);

    header('location: ../product.php');
?>