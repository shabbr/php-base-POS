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
    <label >Product Name</label>
    <input type="text" class="form-control"  name='pname'>
  </div>
 
 
 
    
<div>
<label for="">Category</label>
<br>
    <?php
include('config.php');
 $sql="SELECT * FROM `categories`";
 $result= mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
    
    echo '<select name="slc"><option></option>';
    while($row=mysqli_fetch_assoc($result)){
             echo '<option value='.$row['id'].'>'.$row['cat'].' </option>';
    }
    echo '</select>';
}

 


?>
</div>

  <div class="form-group">
  <label > Sale Price</label>
    <input type="text" class="form-control"  name='sprice'>
  </div>
  <div class="form-group">
  <label >Purchase Price</label>
    <input type="text" class="form-control"  name='pprice'>
  </div>
  <div>
  Quantity <br>
  <input type="number" name='qty'>
  </div><br>
  <button type="submit" name='form' class="btn btn-primary">Submit</button>
</form>
  </body>
</html>
<?php
if(isset($_POST['form'])){
$pname=$_POST['pname'];
//$slc stores id rather than name because we set value['id'] in option tag of html so when submit the form it stores id rather than name
$slc=$_POST['slc'];
$sprice=$_POST['sprice'];
$pprice=$_POST['pprice'];
$qty=$_POST['qty'];
$sql1="INSERT INTO `products` (`id`, `product name`, `category`, `sale price`, `purchase price`, `quantity`,`date`) VALUES (NULL, '$pname', '$slc', '$sprice', '$pprice', '$qty',NOW())";
$result1=mysqli_query($conn,$sql1);
if($result1){
    echo "<script> alert('product added');
    window.location.href='http://localhost/projects/POS_project1/products_manage.php';
     </script>";
}else{
    echo "<script> alert('product not added');
    window.location.href='http://localhost/projects/POS_project1/products_manage.php';
     </script>";
}
}

?>
