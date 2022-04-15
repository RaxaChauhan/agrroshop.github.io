<?php
	include '../include/dbcon.php';

    $id = $_GET['id'];

    $q = "DELETE FROM `cart` WHERE id = $id";

    mysqli_query($con,$q);

    header('location: ../include/cart.php');
?>