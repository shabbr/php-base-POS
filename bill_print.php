<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location:http://localhost/projects/POS_project1/login.php");
}
$customer_name=$_SESSION['customer_name'];
$customer_num=$_SESSION['customer_num'];
$sman_name=$_SESSION['sman_name'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  
    <link rel="stylesheet" href="style.css" media="all" />
</head>
  <body>
<div id="printAble">
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <h1>INVOICE 3-2-1</h1>
      <div id="project">

      <div><span>CLIENT</span> <?php echo $customer_name ?></div>
        <div><span>NUMBER</span>  <?php echo $customer_num ?></div>
        <div><span>SALESMAN</span>  <?php echo $sman_name ?></div>
      </div>
    </header>
    <main>

    
      <table border=1 >
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">PRODUCT NAME</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
            <th>DATE</th>
          </tr>
        </thead>
    <tbody>


<?php
include('config.php');

// if(isset($_GET['ids'])){
  $_GET['ids'];
  $id=json_decode($_GET['ids']);
 
// }
foreach($id as $ids){
$sql="SELECT * FROM `product_detail` where id=$ids";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
 
  echo '  
          <tr>
            <td class="service">'.$row["id"].'</td>
            <td class="desc">'.$row["product name"].'</td>
            <td class="unit">'.$row["price"].'</td>
            <td class="qty">'.$row["quantity"].'</td>
            <td class="total">'.$row["total_price"].'</td>
            <td class="total">'.$row["date"].'</td>
          </tr>  ';
}
}

  $sql4="DELETE FROM `product_detail`";
  $result4=mysqli_query($conn,$sql4);
?>
</tbody>
  </table>
     </div>

     
  <form>
  <input type="button" name='print' value="Print bill"
         onclick="printPageArea('printAble')" />
</form> 

<script>
  
function printPageArea(printAble){
    var printContent = document.getElementById(printAble).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
  window.location.href='http://localhost/projects/POS_project1/billing_manage.php';
 
}   

</script>

</body>
</html>