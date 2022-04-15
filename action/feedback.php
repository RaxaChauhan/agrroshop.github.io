<?php ?>
<html>
	<head>
		<title>
			feedback
		</title>
		  <link rel="stylesheet" href="../style/checkout.css" />
	</head>
	<body>
	 <?php 
 include '../include/dbcon.php';
 session_start();

        if(isset ($_SESSION['is_login']) ){

            if(isset($_POST['submit']))
        {

            $feedback= $_POST['feedback'];

			$u_id= $_SESSION['id'];
            

            

                    $insert="insert into feedback ( `user_id`, `feedback`) values('$u_id','$feedback')";
                
                    mysqli_query($con,$insert) or die(mysqli_error($con));
                
                    ?> <script>alert("FEEDBACK SUCCESSFULLY");
					 location.replace("../include/search.php");
					</script><?php

                
        }
	}
    else{
        ?> <script> location.replace("../login.php"); </script> <?php
    }
?>
		<div class="card" style="margin-top: 7%;">
        <h1 style="margin-left: 10%;">Feedback:</h1>

        <form method="POST" action="#">
		<div class="one">


        <textarea name="feedback" style="margin-left: 26%;margin-top: 8%;/* padding: 7%; */height: 32%;width: 46%;"></textarea>

        <input type="submit" name="submit" value="submit" class="btnn">
        </form>
        </div>



    </div>
	</body>
</html>
