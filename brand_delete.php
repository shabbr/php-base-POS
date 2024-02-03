<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
?>

<?php
include('config.php');
$id=$_GET['id'];
$sql="DELETE FROM `brands` WHERE `id` = $id";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> 
    alert('data deleted');
    window.location.href='http://localhost/projects/POS_project1/brand_manage.php';
     </script>";
}
?>