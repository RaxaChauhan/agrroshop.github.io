<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="..\style\mystyle.css">
</head>
<body>

<?php 

    include '../include/dbcon.php';

    if(isset($_POST['submit']))
    {
        $id= $_POST['id'];
        $u_name= $_POST['u_name'];
        $email= $_POST['email'];
        $pw= $_POST['pw'];

        

        $emailquery = "select * from seller_signup where email='$email'";
        $query = mysqli_query($con,$emailquery);
        $emailcount = mysqli_num_rows($query);

            if($emailcount > 0)
            {
                echo "email already exists";
            }
            else
            {
                $insert="insert into seller_signup values('0','$u_name','$email','$pw')";
            
                mysqli_query($con,$insert) or die(mysqli_error($con));
            
                echo "Registratioin succesful"; 

            }
    }

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $emial_search = " select * from signup where email = '$email' ";
        $query = mysqli_query($con, $emial_search);

        $email_count = mysqli_num_rows($query);

        if($email_count)
        {
            $password_search = " select * from signup where pw = '$password' ";
            $query = mysqli_query($con, $password_search);

            $password_count = mysqli_num_rows($query);

            if($password_count)
            {
                $_SESSION['s_login'] = true;
                echo "Login Successful"; 
?>
             <script> 
                location.replace("index.php");
            </script>
<?php    
            }
            else
            {
                echo "Password Incorrect";
            }
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
                       <input type="email" class="input-field" name="email" placeholder="Enter Email" required>
                        <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                        <input type="checkbox" class="check-box"><span>Rememeber Me</span>
                        <button type="submit" class="submit-btn" name="login">Login</button>
                    </form>


                    <form id="register" class="input-group" action="#" method="POST">
                        <input type="hidden"  name="id">
                        <input type="text" class="input-field" name="u_name" placeholder="User Name" required>
                        <input type="email" class="input-field" name="email" placeholder="Enter Email" required>
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