<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
?>

<?php
include('config.php');
$id=$_GET['id'];
$qty=$_GET['qty'];
$pname=$_GET['pname'];

 $sql1="DELETE FROM `product_detail` WHERE `product_detail`.`id` = $id";
 $result1=mysqli_query($conn,$sql1);
 if($result1){
    $sql="UPDATE products set quantity= quantity+$qty where `product name`='$pname'";
    $result=mysqli_query($conn,$sql);
    echo " <script> alert('Date Deleted');
     window.location.href='http://localhost/projects/POS_project1/billing_manage.php';
     </script>";
 }

?>