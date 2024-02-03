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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  table tr td a{
    text-decoration:none;
    color:black;
  }
  .mg{
    margin:5% 0%;
  }
</style>
    
  </head>
  <body>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   
   <h1>Manage Employees</h1>
    <form action="employee_form.php"> 
    <button type="submit" class="btn btn-primary mg" name="submit">Add Employee </button>  
</form>  



</body>
</html>


 
<?php

include('config.php');
   $sql=' SELECT * FROM `employee_name` ';
   $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
   if($num>0){
    echo " <table border=1 ><tr>
     <th>ID</th>
     <th>EMPLOYEE NAME</th>
     <th>USERNAME </th>
     <th>PASSWORD </th>
     <th>CELL NUMBER </th>
    <th>COMMISION</th>
    <th>OPERATION</th>
    </tr>";

    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>
        <td>'.$row['id']. '</td>
        <td>'.$row['Employee Name']. '</td>
        <td>'.$row['Username']. '</td>
        <td>'.$row['Password']. '</td>
        <td>'.$row['Cell Number']. '</td>
        <td>'.$row['Commission']. '</td>
        <td> <a href="emp_update.php?id='.$row['id'].'">Edit</a>  <a href="emp_delete.php?id='.$row['id'].'">Delete</a> </td>
        </tr>';
    }
    echo "</table>";
   }


?>

 