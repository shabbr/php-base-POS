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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

 
  </head>
  <body>
    

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
<form method='post'>
 <div class="form-group">
 <label >customer Name</label>
    <input type="text" class="form-control"  name='cname'>
  </div>
  <div class="form-group">
    customer number
  <input type="text" class="form-control"  name='cnum'>
  </div>
  <div class="form-group">
 salesman
 <input type="text" class="form-control"  name='sman'>
</div>
<div class="form-group">
 Quanatity
 <input type="number" class="form-control"  name='qty'>
</div>
<div class="form-group">
Product Name
<select name="slc">
  <option></option>
<?php
include("config.php");
$sql="SELECT * FROM `products`";
$result=mysqli_query($conn,$sql);
if($result && mysqli_num_rows($result)>0){
  " <option>".$row['product name']." </option>";
  while($row=mysqli_fetch_assoc($result)){
   echo " <option value=".$row['id'].">".$row['product name']." </option>";
  }
}
?>
</select>
</div>
<div class="form-group">
 Amount
 <input type="text" class="form-control"  name='amount'>
</div>
<div class="form-group">
Sales Date
 <input type="date" class="form-control"  name='sdate'>
</div>
<div class="form-group">
Sales Time
 <input type="time" class="form-control"  name='stime'>
</div>
 
 
  <button type="submit" name='sform' class="btn btn-primary">Submit</button>
</form>
  </body>
</html>

<?php
 if(isset($_POST['sform'])){
  $cname=$_POST['cname'];
  $cnum=$_POST['cnum'];
  $sman=$_POST['sman'];
  $qty=$_POST['qty'];
  $slc=$_POST['slc'];
  $amount=$_POST['amount'];
  $date=$_POST['sdate'];
  $time=$_POST['stime'];
$date = $_POST['sdate'];
$time = $_POST['stime'];
$sdate=date('Y-m-d');
$stime=date('H:i A');
 $sql="INSERT INTO `sale_manage` (`id`, `customer_name`, `customer_number`, `salesman`, `quantity`, `product_name`, `amount`, `date`, `time`) VALUES (NULL, '$cname', '$cnum', '$sman', '$qty', '$slc', '$amount', '$sdate', '$stime')";
   $result=mysqli_query($conn,$sql);
   if($result){
    echo "<script> alert('sale added');
    window.location.href='http://localhost/projects/POS_project1/sale_manage.php';
     </script>";
   }


 }

?>