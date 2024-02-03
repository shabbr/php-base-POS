<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>



<?php

$sun='';
$spsd='';
$simage='';

include("config.php");
$Id=$_GET['id'];
//show recent data
$sql1="SELECT * FROM `mange_admin` where id=$Id";
$result1=mysqli_query($conn,$sql1);
$num=mysqli_num_rows($result1);
if($num>0){
    while($row=mysqli_fetch_assoc($result1)){
        $sun=$row['username'];
        $spsd=$row['password'];
        $simage=$row['image'];
    }
}



// save chaged data
if(isset($_POST['submit'])){
    $un=$_POST['username'];
    $psd=$_POST['password'];
    $file_name=$_FILES['image']['name'];
    $image=$_FILES['image']['tmp_name'];
 //    $imagedata=file_get_contents($image);
  if(!empty($image)){
 $file="images/".$file_name ;
 move_uploaded_file($_FILES['image']['tmp_name'],$file);
 $image_query=", `image`='$file'";
  }else{
  $image_query =  ", `image` = '$simage'";
  }
 $sql="UPDATE `mange_admin` SET `username` = '$un', `password` = '$psd'  $image_query WHERE `mange_admin`.`id` = $Id";
 $result=mysqli_query($conn,$sql);
 if($result){
     echo "<script>alert('data updated');</script>";
 }else{
     echo "<script>alert('data not updated');</script>";
 }
 echo "<script> 
 window.location.href='manage1.php';
 </script>";

 }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 
  </head>
  <body>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <form method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="Username">Username</label> 
    <input type="text" value=' <?php echo "$sun" ?> ' class="form-control" name='username'  aria-describedby="emailHelp" placeholder="Username">
    <small id="emailHelp" class="form-text text-muted"> </small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value=' <?php echo $spsd ?>' class="form-control" id="exampleInputPassword1" name='password' placeholder="Password">
  </div>
  <div class="form-group">
    <label for="image">Image</label> 
    <br>
  
    <img src=" <?php echo $simage ?>" alt="image" height='5%' width='5%'>
    <input type="file" value=' <?php echo $simage ?>' class="form-control" name="image">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> 

</body>
</html>


















