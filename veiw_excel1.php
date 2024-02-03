<?php
include('config.php');
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
$start=$_SESSION['start'];
$end=$_SESSION['end'];
$sql="SELECT * from customer_detail where `date` BETWEEN '$start' AND '$end'";
$result=mysqli_query($conn,$sql);
 
 
  
  
 if(mysqli_num_rows($result)>0){
  header('Content-Type:Application/xls');
  header('Content-Disposition:Attachment;filename=file.xls');
     echo  '<table class="table table-hover table-light"><thead> 
     <tr>
     <th scope="col">id</th>
     <th scope="col">Customer name</th>
     <th scope="col">Customer number</th>
     <th scope="col">Salesman</th>
     <th scope="col">Product name</th>
     <th scope="col">Price</th>
     <th scope="col">Quantity</th>
     <th scope="col">Total price</th>
     <th scope="col">Received</th>
     <th scope="col">Status</th>
     <th scope="col">Date</th>
     <th scope="col">Time</th>
     </tr> </thead>';
     while($row=mysqli_fetch_assoc($result)){
            echo ' <tr>
            <td>'.$row['id'].'</td> 
            <td>'.$row['customer_name'].'</td>
            <td>'.$row['customer_number'].'</td>
            <td>'.$row['salesman'].'</td>
            <td>'.$row['product_name'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['cquantity'].'</td>
            <td>'.$row['total_price'].'</td>
            <td>'.$row['received'].'</td>
            <td>'.$row['status'].'</td>
            <td>'.$row['date'].'</td>
          <td>'.$row['time'].'</td> </tr>';
     }
     echo '</table>'; 
  }else{
      echo "<script>alert('file is empty');
      window.location.href='http://localhost/projects/POS_project1/veiw_sale.php';
       </script>";
    }
 
 
 
 ?>