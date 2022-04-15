<?php

    session_start();

?>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="style\mystyle.css">
    </head>

    <body>
<?php
        
        include 'include/dbcon.php';

        if(isset($_POST['submit']))
        {
            $id= $_POST['id'];
            $f_name= $_POST['f_name'];
            $email= $_POST['email'];
            $pw= $_POST['pw'];
            

            

            $emailquery = "select * from signup where email='$email'";
            $query = mysqli_query($con,$emailquery);
            $emailcount = mysqli_num_rows($query);

                if($emailcount > 0)
                {
                    echo "email already exists";
                }
                else
                {
                    $insert="insert into signup (`f_name`, `email`, `pw`) values('$f_name','$email','$pw')";
                
                    mysqli_query($con,$insert) or die(mysqli_error($con));
                
                    ?> <script>alert("REGISTRATION SUCCESSFULLY")</script><?php

                }
        }

        if(isset($_POST['login']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $email_search = " select * from signup where email = '$email' ";
            $query = mysqli_query($con, $email_search);

            $email_count = mysqli_num_rows($query);

            if($email_count)
            {

                $value_pass = mysqli_fetch_assoc($query);

                $db_pass = $value_pass['pw'];


                $_SESSION['f_name'] = $value_pass['f_name'];
                $_SESSION['id'] = $value_pass['id'];
                $utype= $value_pass['utype'];
				$status= $value_pass['status'];

				

                if($password == $db_pass)
                {
                    if($utype==1)
                    {
                        ?>
                            <script> 
                                location.replace("admin/index.php");
                            </script>
<?php
                        echo "hello admin";
                    }
                    else{
							if($status==1){
									 $_SESSION['is_login'] = true;
									 echo "Login Successful";
		?>
									<script> 
										location.replace("include/search.php");
									</script>
							
<?php
							}
							else
							{
								?>
									<script>alert("you are restricted");</script>
								<?php
							}
                        }
                     }
                else
                {
                    echo "Password Incorrect";
                }
     
            }
            else
            {
                echo "email incorrect";
            }
        }
?>
        <div class="bg">
            <div class="formbox">
                <div class="button-box">
                    <div id="btn"></div> 
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn"onclick="register()">Signup</button>
                </div> 
                
                    <form id="login" class="input-group" action="<?php echo htmlentities($_SERVER ['PHP_SELF']);?>" method="POST">
                        <i><img src="img/email.svg" alt="email"> </i> 
                        <input type="email" class="input-field" name="email" placeholder="Enter Email" required>
                        <i style="margin: 19%;margin-left: auto;"><img src="img/lock.svg" alt="lock"> </i> 
                        <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                        
                        <button type="submit" class="submit-btn" name="login" style="margin: 39px 6px;">Login</button>
                    </form>

                    <form id="register" class="input-group" action="#" method="POST">
                        <input type="hidden"  name="id">
                        <i><img src="img/account.svg" alt="account"> </i>
                        <input type="text" class="input-field" name="f_name" placeholder="User Name" required>
                        <i style="margin: 18%;margin-left: auto;"><img src="img/email.svg" alt="email"> </i>
                        <input type="email" class="input-field" name="email" placeholder="Enter Email" required>
                        <i style="margin: 36%;margin-left: auto;"><img src="img/lock.svg" alt="lock"> </i>
                        <input type="password" class="input-field" name="pw" placeholder="Enter Password" required>
                        <input type="checkbox" class="check-box"><span>I agree to the tearms & condition</span>
                        <button type="submit" class="submit-btn" name="submit">Register</button>
                    </form>
                
            </div>
        </div>
        <script>
             var x = document.getElementById("login");
             var y = document.getElementById("register");
             var z = document.getElementById("btn");

             function register()
             {
                 x.style.left = "-400px";
                 y.style.left = "50px";
                 z.style.left = "110px";
             }
             function login()
             {
                 x.style.left = "50px";
                 y.style.left = "450px";
                 z.style.left = "0";
             }
        </script>
    </body>
</html>