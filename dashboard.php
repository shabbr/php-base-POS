<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
?>



<?php
include('config.php');

$sql="SELECT SUM(amount) AS total_amount FROM sale_manage";
$sales=mysqli_query($conn,$sql); 
$sales_d=mysqli_fetch_assoc($sales);
$sql1="SELECT COUNT(id) AS total_rows FROM products";
$products=mysqli_query($conn,$sql1);
$products_d=mysqli_fetch_assoc($products);
$sql2="SELECT SUM(amount) AS total_amount FROM expense";
$expenses=mysqli_query($conn,$sql2);
$expenses_d=mysqli_fetch_assoc($expenses);
$sql3="SELECT COUNT(id) AS total_rows FROM categories";
$categories=mysqli_query($conn,$sql3);
$categories_d=mysqli_fetch_assoc($categories);
$sql4="SELECT COUNT(id) AS total_rows FROM brands";
$brands=mysqli_query($conn,$sql4);
$brands_d=mysqli_fetch_assoc($brands);
$sql5="SELECT COUNT(id) AS total_rows FROM employee_name";
$employees=mysqli_query($conn,$sql5);
$employees_d=mysqli_fetch_assoc($employees);
$sql6="SELECT COUNT(id) AS total_rows FROM mange_admin";
$admins=mysqli_query($conn,$sql6);
$admins_d=mysqli_fetch_assoc($admins);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
    .mr{
        margin:12% 25%;
    }
</style>
  </head>
  <body>
<div class='mr'>
  
    <h3><?php echo $sales_d['total_amount'] ;?>  Sales</h3>
    <h3><?php echo $products_d['total_rows'] ; ?> Products </h3>
    <h3><?php echo $expenses_d['total_amount'] ; ?> Expenses</h3>
    <h3><?php echo $categories_d['total_rows'] ; ?> Categories </h3>
    <h3><?php  echo $brands_d['total_rows'] ; ?> Brands </h3>
    <h3><?php echo $employees_d['total_rows'] ; ?> Employees</h3>
    <h3><?php echo $admins_d['total_rows'] ; ?>Admins </h3>
    
        
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>