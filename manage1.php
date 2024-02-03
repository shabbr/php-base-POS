<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
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

 <style>
     table tr td a{
        text-decoration:none;
        color:black;
       
    }
 </style>
  </head>
  <body>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <form action="manage.php"> 
    <button type="submit" class="btn btn-primary" name="submit">Add Admin </button>  
</form> 
</body>
</html>

<?php
include('config.php');
$sql="SELECT * FROM `mange_admin`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    echo "<table border=2><tr><th> Id </th> <th>Username</th> <th>Password</th><th>image</th> <th>Operations</th> </tr>";
    while($rows=mysqli_fetch_assoc($result)){
        echo '<tr><td>'.$rows["id"].' </td>
        <td>'. $rows["username"].'</td>
        <td>'. $rows["password"].' </td>
        <td><img src="'.$rows["image"].'" alt="img" width="70px" height="70px"> </td>    
        
        <td><a href="manage_update.php?id='.$rows["id"].'">Edit</a>
        <a href="manage_delete.php?id='.$rows["id"].'">Delete</a></td>
        </tr>';
    }
    echo "</table>";
}

?>