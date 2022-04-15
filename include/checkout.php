<?php
    include "dbcon.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title> home </title>
  <link rel="stylesheet" href="../style/checkout.css" />
  </head>
  <body>

    <section id="home">
    <?php
	 include "navbar.php";
	$u_id = $_SESSION['id'];
    $sql= "select * from cart where user_id= '$u_id' ";
    $res= mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0) {
	?>

<div class="card">
        <h1 style="margin-left: 10%;">Place a Order:</h1>

        <form method="POST" action="../action/place_order.php">
        <div class="one">
        <label for="fname">Full Name </label><br>
        <input type="text"  name="fname"><br>
        <label for="lname">City</label><br>
        <input type="text"  name="lname"><br>
        <label for="lname">State</label><br>
        <input type="text"  name="lname"><br>
        </div>
        
        <div style="margin-left: 40%; margin-top: -19%;">
        <label for="lname">Address</label><br>
        <input type="text"  name="address" style="width:82%;"><br>
        <label for="lname">Telephone</label><br>
        <input type="text"  name="mobile">

        </div>
        <input type="submit" name="submit" value="place a order" class="btnn">
        </form>
        



    </div>

    <?php } else { ?>

        <script>
            alert("Your cart is Empthy");
			location.replace("search.php");
        </script>

		<?php } ?>
    </section>


    
  </body>
</html>


