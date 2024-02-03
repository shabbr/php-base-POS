<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>


<?php
include('config.php');
$id=$_GET['id'];
$sql="DELETE FROM `products` WHERE `products`.`id` = $id";
$result=mysqli_query($conn,$sql);
if($result){
    echo " <script>alert('product deleted');
    window.location.href='http://localhost/projects/POS_project1/products_manage.php';
    </script>";
}else{
    echo " <script>alert('product not deleted');
    window.location.href='http://localhost/projects/POS_project1/products_manage.php';
    </script>";
}

?>