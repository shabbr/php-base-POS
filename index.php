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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>dashboard</title>
    <style>
    .mr{
        margin:12% 25%;
    }
 
</style>
  </head>
  <body>
    <h2>Admin Panel</h2>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin_form.html"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="billing_manage.php">Billing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sale_manage.php">Manage Sales <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="products_manage.php">Products<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="expense_manage.php">Manage Expenses  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="brand_manage.php">Brands<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cat_manage.php">Categories<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="employee_manage.php">Manage Employees<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="manage1.php">Manage Admin<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="expired.php">Expired <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="veiw_sale.php">View <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="reports.php">Reports <span class="sr-only">(current)</span></a>
      </li>
      <button><a href='logout.php'>Logout </a></button>
    </ul>
  </div>
</nav>


<div class='mr'>
    <h3><?php echo $sales_d['total_amount'] ;?>  Sales</h3>
    <h3><?php echo $products_d['total_rows'] ; ?> Products </h3>
    <h3><?php echo $expenses_d['total_amount'] ; ?> Expenses</h3>
    <h3><?php echo $categories_d['total_rows'] ; ?> Categories </h3>
    <h3><?php  echo $brands_d['total_rows'] ; ?> Brands </h3>
    <h3><?php echo $employees_d['total_rows'] ; ?> Employees</h3>
    <h3><?php echo $admins_d['total_rows'] ; ?>Admins </h3>
</div>



</body>
</html>


