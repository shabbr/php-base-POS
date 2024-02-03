<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>


<?php
 include('config.php');
 $Id=$_GET['id'];
 
 $sql="DELETE FROM `mange_admin` WHERE `mange_admin`.`id` = $Id ";
 $result=mysqli_query($conn,$sql);
 if($result){
    echo "<script>alert('data deleted') ;
    window.location.href='manage1.php';
    </script>";
 }
 
?>