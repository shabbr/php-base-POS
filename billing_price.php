<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
?>


<?php
include('config.php');
if(isset($_POST['success'])){
    $pns=$_POST['success'];
 $sql6="SELECT `sale price` FROM `products` where `product name`='$pns'  ";
 $result6=mysqli_query($conn,$sql6);
$num=mysqli_num_rows($result6);
if($num>0){ 
 while($row6=mysqli_fetch_assoc($result6)){
 // echo '<option value="'. $row6['sale price'].'">'.$row6['sale price'].'</option>';
 echo $row6['sale price'];
}
}
}
?>