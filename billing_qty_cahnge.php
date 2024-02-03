<?php
include('config.php');
$qty = $_POST['success'];
$name = $_POST['name'];
$sql = "SELECT quantity FROM products WHERE  `product name` = '$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //  while ($row = mysqli_fetch_assoc($result)) {
   
   $row = mysqli_fetch_assoc($result);
    // Check if available quantity is greater than 0
        if (($row['quantity'] - $qty) < 0) {
            echo 0;
        } else {
            echo "yes";
        }
    }
else {
    echo"error";
}
?>





