<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>


<?php
include('config.php');
$val=$_POST['search'];
//use join query to select values from different tables
$sql= "SELECT p.id, p.`product name`, c.cat, p.`sale price`, p.`purchase price`, p.quantity, p.date
        FROM products p
        JOIN categories c ON p.category = c.id where `product name` LIKE '%{$val}%'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
echo '
<table class="table tb table-hover" id="table">
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
 echo "<h1> No record found</h1>";
}

?>