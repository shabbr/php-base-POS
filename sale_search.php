<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>


<?php
include('config.php');

$value=$_POST['search'];
$sql = "SELECT * FROM `customer_detail` WHERE `customer_name` LIKE '%$value%' OR `salesman` LIKE '%$value%' OR `product_name` LIKE '%$value%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    echo '<table class="table table-hover mt-5 "  >
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
</thead>';
while($row=mysqli_fetch_assoc($result)){
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
    </tr></tbody>';
}
echo "</table>";
}
else{
    echo '<h3> Not found </h3>';
}

?>