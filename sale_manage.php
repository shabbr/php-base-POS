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
  .cl{
    clear:both;
  }
</style>
  </head>
  <body>
<h3>Sale Management</h3>
<input type="search" placeholder='search' id='search'>
<form method='post'   class='float-right'>
 from <input type="date" name='sdate' id='sdate_filter'>
to <input type="date" name='edate' id='edate_filter'>
<input type="submit" name='filter' id='filter' class='btn btn-primary' value='filter'>
</form>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
 $(document).ready(function(){
  $("#search").on("keyup",function(){
    var search=$(this).val();
    $.ajax({
      url:"sale_search.php",
      type:"POST",
      data:{search:search},
      success:function(data){
      $("#s_table").html(data);
      }
    })
  })

  // $("#filter").on("click",function(){
  //   var sdate=$("#sdate_filter").val();
  //   var edate=$("#edate_filter").val();
  //   $.ajax({
  //     url:"sale_date_search.php",
  //     type:"POST",
  //     data:{sdate:sdate,edate:edate},
  //     success:function(data){
  //       console.log(data);
  //     $("#s_table").html(data);
  //     }
  //   })
  // })

 })

  </script>
    <table class="table table-hover mt-5 " id="s_table">
  <thead>
    <tr>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Number</th>
      <th scope="col">Salesman</th>
     
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
 
  </body>
</html>




<?php

include('config.php');

if(isset($_POST['filter'])){
  $start_d=new DateTime($_POST['sdate']);
  $end_d=new DateTime($_POST['edate']);
  $start=$start_d->format('Y-m-d');
  $end=$end_d->format('Y-m-d'); 
  $sql1="SELECT * from customer_detail where `date` BETWEEN '$start' AND '$end'";
  $result1=mysqli_query($conn,$sql1);
}else{
$sql1="SELECT * FROM customer_detail";
$result1=mysqli_query($conn,$sql1);
}
if(mysqli_num_rows($result1)>0){
  $b=0;
  $sales_number=0;
  $sale=0;
  $purchase=0;
 
  while($row=mysqli_fetch_assoc($result1)){

    echo '<tbody>
    <tr> 
    <td>'.$row['customer_name'].'</td>
    <td>'.$row['customer_number'].'</td>
    <td>'.$row['salesman'].'</td>

    <td>'.$row['product_name'].'</td>
    <td>'.$row['price'].'</td>
    <td>'.$row['cquantity'].'</td>
    <td>'.$row['total_price'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['time'].'</td>
    </tr>';
  
 
$b=$b+$row['total_price'];

 
}
echo '</tbody>
</table> <br><br>';
 echo "<h3 class='cl'> Opening balance : ".$b."</h3>";




//to count total sale/purchase/profit using products table
  $sql1="SELECT p.`product name`, p.`sale price`, p.`purchase price`,cd.product_name, cd.`cquantity`
  FROM `products` p
  JOIN `customer_detail` cd ON p.`product name` = cd.`product_name`";
  $result1=mysqli_query($conn,$sql1);
  $tsale=0;
$tpurchase=0;
if(mysqli_num_rows($result1)>0){
  while($row=mysqli_fetch_assoc($result1)){
    $tsale=$tsale+($row['sale price']*$row['cquantity']);
    $tpurchase=$tpurchase+($row['purchase price']*$row['cquantity']);   
}
$profit=$tsale-$tpurchase;

  echo " <br> Total sale: " .$tsale."Rs<br> total purchase: ".$tpurchase."Rs <br> Profit: ".$profit."Rs";
 
}else{
  echo "Total sale:0Rs <br> total purchase:0Rs <br> Profit:0Rs";
}

}else {
  echo '</tbody>
  </table> <br><br>';
  echo "<h3 class='cl'> No records found.</h3>";

}



    ?>

 