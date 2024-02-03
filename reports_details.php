

<?php
include('config.php');
$report_id=$_GET['report_id'];
$sql="SELECT * FROM `customer_detail` where report_id = '$report_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
   echo "<table border=1><thead><tr>
   <th>Customer Name </th>
   <th>Customer Number</th>
   <th>Salesman</th>
   <th>Product Name</th>
   <th>Price</th>
   <th>Quantity</th>
   <th>Total Price</th>
   <th>Date</th>
   <th>Time</th>
   <th>Received</th>
   <th>Status</th>
   </tr></thead><tbody>";
    while($row=mysqli_fetch_assoc($result)){        
   echo '<tr>
   <td>'.$row['customer_name'].' </td>
   <td>'.$row['customer_number'].' </td>
   <td>'.$row['salesman'].' </td>
   <td>'.$row['product_name'].' </td>
   <td>'.$row['price'].' </td>
   <td>'.$row['cquantity'].' </td>
   <td>'.$row['total_price'].' </td>
   <td>'.$row['date'].' </td>
   <td>'.$row['time'].' </td>
   <td>'.$row['received'].' </td>
   <td>'.$row['status'].' </td></tr>';
 
    }
    echo "</tbody></table>";
} 
?>