<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
 username:
 <input type="text" name="username"><br>
 password:
 <input type="password" name="password">
<br><br>
<input type="submit" name='login' value="Login">
<br>
If you don't have account <a href="signup.php">SignUp</a> here
    </form>
</body>
</html>
<?php
include('config.php');
if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT id,username,password FROM `project1` where username='$username' AND password='$password'";
     $result=mysqli_query($conn,$sql) or die('mistake in query');

     if(mysqli_num_rows($result)>0){
     while($row=mysqli_fetch_assoc($result)){
 
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
  echo "<script>alert('login successfully');
   window.location.href='http://localhost/projects/POS_project1/index.php';
  </script>";
   
     }
     }else{
        echo "<script>alert('invalid username or password')</script>";
     }
 
}










// $username=mysqli_real_escape_string($conn,$_POST['username']);
// $password=md5($_POST['password']);
?>