<?php
    include '../include/dbcon.php';
    include 'include/side.php';
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/table.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<?php
   session_start();

   $sql= "select * from feedback order by id";


    $res= mysqli_query($con,$sql);

?>

    
    <h1>Feedback</h1>
  <div class="card"> 
    <table>
      <tr>
        <th width="1%">User</th>
        <th width="1%">Feedback</th>

      </tr>
      
      <?php if(mysqli_num_rows($res)>0) { 
  
          while($row = mysqli_fetch_assoc($res)){
            $u_id=$row['user_id'];
            $sql2= "select * from signup where id = '$u_id'";
            $res2= mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_assoc($res2);

          ?>
      <tr>
      
   <td><?php echo $row2['f_name'] ?></td>
        <td ><?php echo $row['feedback'] ?></td>
       
       
      
      </tr>

      <?php
         
    }
     } else { ?>
        <tr>
        <td colspan="2">no data</td>
      </tr>
      <?php } ?>

    </table>
  </div>
</body>
</html>