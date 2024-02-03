<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>

<?php
 include('config.php');
 $id=$_GET['id'];
 $sql="SELECT * FROM `employee_name` where id=$id";
 $result=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($result);
 if($num>0){
    while($row=mysqli_fetch_assoc($result))
    {
        $ename=$row['Employee Name'];
        $uname=$row['Username'];
        $psd=$row['Password'];
        $num=$row['Cell Number'];
        $com=$row['Commission'];
    }
 }
 







if(isset($_POST['update'])){
     $ename=$_POST['ename'];
     $uname=$_POST['username'];
     $psd=$_POST['password'];
     $cn=$_POST['number'];
     $com=$_POST['commission'];
     $sql1="UPDATE `employee_name` SET `Employee Name` = '$ename', `Username` = '$uname', `Password` = '$psd', `Cell Number` = '$cn', `Commission` = '$com' WHERE `employee_name`.`id` = $id";
     $result1=mysqli_query($conn,$sql1);
    if($result1){
     echo "<script> alert('data updated');
     window.location.href='http://localhost/projects/POS_project1/employee_manage.php';
       </script>";
}else{
    echo "<script> alert('data not updated');
    window.location.href='http://localhost/projects/POS_project1/employee_manage.php';
      </script>";
}
}




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 
  </head>
  <body>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <form method="post" id='uform'>
    <div class="form-group">
    <label for="Employee name">Employee name</label>
    <input type="text" class="form-control" value= <?php echo $ename ?> name='ename' id="ename"  placeholder="Employee Name">
    <small   class="form-text text-muted"> </small>
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" id="uname" value= <?php echo $uname ?> class="form-control" name='username'   placeholder="Username">
    <small  class="form-text text-muted"> </small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value= <?php echo $psd ?>  class="form-control" id="psd" name='password' placeholder="Password">
  </div>

  <div class="form-group">
    <label for="Cell Number">Cell Number</label>
    <input type="text" id="num" value= <?php echo $num ?> class="form-control" name='number'   placeholder="Cell Number">
    <small  class="form-text text-muted"> </small>
  </div>

  <div class="form-group">
    <label for="Commision">Commision</label>
    <input type="text" id="com"  value= <?php echo $com ?>   class="form-control" name='commission'   placeholder="Commision">
    <small   class="form-text text-muted"> </small>
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
</form> 
</body>
</html>

