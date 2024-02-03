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

 <style>
    .tb{
        width:70%;
        border:1px solid;
        margin:5% 15%;
    }
    table tbody tr td a{
      text-decoration:none;
      color:black;
      margin-right:8px;
    }
.float{
  float:right;
margin-right:15%
}
 
 </style>
  </head>
  <body>
  <h3 class='m-3' >Product Manage</h3>  <hr> 
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


    <form action="product_form.php" method='post'>
    <button type="submit" name='submit' class="btn m-3 btn-primary">Add Product</button>
    </form> <hr>
    <input type="search" name='search' placeholder='search' id="search" class='float'><br><br>
  <div >
   
  <form action="" method='post'class='float'  >

    Date From:
        <input type="date" name='start' >
       Date To:
            <input type="date" name="end">
       <button type="submit" name='filter' class="btn btn-primary m-3">filter</button>
       </form></div>
       

<!-- for Search -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
 <script>
$(document).ready(function(){
 $("#search").on("keyup",function(e){
  var src=$("#search").val();
  // $("#man").text(src);
  $.ajax({
    url:"product_search.php",
    type:"post",
    data:{search:src},
    success:function(data){
 $("#table").html(data);
    }
  })

  })


//pagination

// $(".active").on("click" , function(t){
//   var num=`(this).text(".active")`;
//   $.ajax({
//     url:"product_pagination.php",
//     type:"post",
//     data:{ page:num},
//     success: function(data){
   
//       console.log( num);
//     }
//   })
// })

});
</script>
      </body>
</html>

<?php
include('config.php');
if(isset($_POST['filter'])){

  $start1=$_POST['start'];
  $end1=$_POST['end'];
 
$start=new DATETIME($start1);
$end=new DATETIME($end1);

$sql = "SELECT p.id, p.`product name`, c.cat, p.`sale price`, p.`purchase price`, p.quantity, p.date
        FROM products p
        JOIN categories c ON p.category = c.id
        WHERE p.`date` BETWEEN '" . $start->format('Y-m-d') . "' AND '" . $end->format('Y-m-d') . "'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
} else{
//join query to select values form two tables in one row
$sql= "SELECT p.id, p.`product name`, c.cat, p.`sale price`, p.`purchase price`, p.quantity, p.date
        FROM products p
        JOIN categories c ON p.category = c.id";
$result= mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
}
echo '<table class="table tb table-hover" id="table">
<thead>
  <tr>
    <th scope="col">Product Name</th>
    <th scope="col">Categories</th>
    <th scope="col">Sale Price</th>
    <th scope="col">Purchase Price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Action</th>
  </tr>
</thead>';

if($num>0){


  while($row=mysqli_fetch_assoc($result)){
 //following  $row['cat']. this colom name is of categories table not product table because we are fetching its value
 echo '<tbody><tr> 
<td>'.$row['product name'].'</td>
<td>'.$row['cat'].'</td>
 <td>'.$row['sale price'].'</td>
 <td>'.$row['purchase price'].'</td>
 <td>'.$row['quantity'].'</td>
 <td> <a href="product_update.php?id='.$row['id'].'"> Edit </a> <a href="product_delete.php?id='.$row['id'].'"> Delete</a>   </td>
    </tr></tbody>';

}
echo '</table>';
}else{
  echo "<tr><td><h3> Record not found</h3></td></tr>";
}










// echo '<div class="float"><button class="active">1</button>
// <button class="active">2</button>
// <button class="active">3</button></div>';





?>
