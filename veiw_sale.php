<?php
include('config.php');
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
  <form method='post'  class='float-right'>
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
    <table class="table table-hover table-dark"><thead> 
    <tr>
    <th scope="col">id</th>
    <th scope="col">Customer name</th>
    <th scope="col">Customer number</th>
    <th scope="col">Salesman</th>
    <th scope="col">Product name</th>
    <th scope="col">Price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Total price</th>
    <th scope="col">Grand Total</th>
    <th scope="col">Received</th>
    <th scope="col">Status</th>
    <th scope="col">Date</th>
    <th scope="col">Time</th>
    </tr> </thead><tbody>


<?php



 
if(isset($_POST['filter'])){
  $start_d=new DateTime($_POST['sdate']);
  $end_d=new DateTime($_POST['edate']);
  $start=$start_d->format('Y-m-d');
  $end=$end_d->format('Y-m-d'); 
  $sql="SELECT * from customer_detail where `date` BETWEEN '$start' AND '$end'";
  $result=mysqli_query($conn,$sql);
$_SESSION['start']=$start;
 $_SESSION['end']=$end;
if(mysqli_num_rows($result)){
    $gt=0;
    while($row=mysqli_fetch_assoc($result)){
        $gt+=$row['total_price'];
           echo ' <tr>
           <td>'.$row['id'].'</td> 
           <td>'.$row['customer_name'].'</td>
           <td>'.$row['customer_number'].'</td>
           <td>'.$row['salesman'].'</td>
           <td>'.$row['product_name'].'</td>
           <td>'.$row['price'].'</td>
           <td>'.$row['cquantity'].'</td>
           <td>'.$row['total_price'].'</td>
           <td>'.$row['grand_total'].'</td>
           <td>'.$row['received'].'</td>
           <td>'.$row['status'].'</td>
           <td>'.$row['date'].'</td>
         <td>'.$row['time'].'</td> </tr>';
    }
}else{
  echo " <tr> <td> <h2>Data Not found </h2></td></tr>";
  $gt=0;
 
} echo '</tbody></table>';


?>
<form action="veiw_excel1.php" method='post'>
 <button type='submit' name='excel1'>
  Excel
 </button>
 
<!-- <button type='submit' name='excel'>
Dowenload Excel 
</button> -->
</form> <br>
<form action="veiw_pdf1.php" method='post'>
<button type='submit' name='pdf'>
  PDF 
</button>
</form>

<h2>Grand total is <?php echo  $gt; ?></h2>
<?php  }else{ 
  $sql="SELECT * FROM `customer_detail`";
  $result=mysqli_query($conn,$sql); 
  
 
if(mysqli_num_rows($result)){
  $gt=0;
  while($row=mysqli_fetch_assoc($result)){
      $gt+=$row['total_price'];
         echo ' <tr>
         <td>'.$row['id'].'</td> 
         <td>'.$row['customer_name'].'</td>
         <td>'.$row['customer_number'].'</td>
         <td>'.$row['salesman'].'</td>
         <td>'.$row['product_name'].'</td>
         <td>'.$row['price'].'</td>
         <td>'.$row['cquantity'].'</td>
         <td>'.$row['total_price'].'</td>
         <td>'.$row['grand_total'].'</td>
         <td>'.$row['received'].'</td>
         <td>'.$row['status'].'</td>
         <td>'.$row['date'].'</td>
       <td>'.$row['time'].'</td> </tr>';
  }
}else{
echo " <tr> <td> <h2>Data Not found </h2></td></tr>";
$gt=0;

} echo '</tbody></table>';


?>
<form action="veiw_excel1.php" method='post'>
<button type='submit' name='excel'>
Dowenload Excell  
</button>

 
</form> <br>
<form action="veiw_pdf.php" method='post'>
<button type='submit' name='pdf'>
Dowenload PDF 
</button>
</form>

<h2>Grand total is <?php echo  $gt; ?></h2>
<?php  } ?>
  

</body>
</html>
