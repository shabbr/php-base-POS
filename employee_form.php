<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
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
    <form method="post" id='eform'>
    <div class="form-group">
    <label for="Employee name">Employee name</label>
    <input type="text" class="form-control" name='ename' id="ename"  placeholder="Employee Name">
    <span class="ename"></span>
    <small   class="form-text text-muted"> </small>
  </div>
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" id="uname" class="form-control" name='username'   placeholder="Username">
    <span class="uname"></span>
    <small  class="form-text text-muted"> </small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  class="form-control" id="psd" name='password' placeholder="Password">
    <span class="psd"></span>
  </div>

  <div class="form-group">
    <label for="Cell Number">Cell Number</label>
    <input type="text" id="num" class="form-control" name='number'   placeholder="Cell Number">
    <span class="num"></span>
    <small  class="form-text text-muted"> </small>
  </div>

  <div class="form-group">
    <label for="Commision">Commision</label>
    <input type="text" id="com" class="form-control" name='commission'   placeholder="Commision">
    <span class="com"></span>
    <small   class="form-text text-muted"> </small>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> 

<script>
$(document).ready(function(){
 
$("#eform").submit(function(){

 var ename=$("#ename").val();
 var uname=$("#uname").val();
 var psd=$("#psd").val();
 var num=$("#num").val();
 var com=$("#com").val();
 var nptr=/^[A-Z a-z]+$/;
 var cptr=   /^(\d+|\d+\%)$/;
 var cptr1= /^(\d+(\.\d+)?\%)$/;
if(ename==''){
  $(".ename").text("please fill all fields");
  return false;
}
if(!ename.match(nptr)){
  $(".ename").text("numbers are not allowed");
  return false;
}
if(uname==''){
  $(".uname").text("please fill all fields");
  return false;
}
if(psd==''){
  $(".psd").text("please fill all fields");
  return false;
}
if(num==''){
  $(".num").text("please fill all fields");
  return false;
}
if(num.match(nptr)){
  $(".num").text("alphabets are not allowed");
  return false;
}
if(com==''){
  $(".com").text("please fill all fields");
  return false;
}if(!com.match(cptr)){
  $(".com").text("alpbets are not allowed");
  return false;
}
if(!com.match(cptr1)){
  $(".com").text("% sign is mandatory");
  return false;
}

})
})

</script>

</body>
</html>
<?php
include('config.php');
if(isset($_POST['submit'])){
  $ename=$_POST['ename'];
  $uname=$_POST['username'];
  $psd=$_POST['password'];
  $cn=$_POST['number'];
  $com=$_POST['commission'];
  $sql="INSERT INTO `employee_name` (`id`, `Employee Name`, `Username`, `Password`, `Cell Number`, `Commission`) VALUES (NULL, '$ename', '$uname', '$psd', '$cn', '$com')";
  $result=mysqli_query($conn,$sql);
 if($result){
  echo "<script> alert('employee data added');
  window.location.href='http://localhost/projects/POS_project1/employee_manage.php';
    </script>";
 }else{
  echo "<script> alert('employee data added');
  window.location.href='http://localhost/projects/POS_project1/employee_manage.php'; 
  </script>";
 }
}


 

?>