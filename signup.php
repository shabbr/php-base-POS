<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color:red;
        }
    </style>
 </head>
 <body>
 <p class="para"></p>

    <form action="" method="post" id="form" >
   fname: 
   <input type="text" name="fname" id="fname"  >
   <span class="fname error"></span> <br>
   lname: 
   <input type="text" name="lname" id='lname'  >
   <span class="lname error"></span> <br>
   username: 
   <input type="text" name="username" id='username'  > 
   <span class="username error"></span> <br>
   password: 
   <input type="password" name="password" id='psd' >
   <span class="psd error"></span> <br>
   confirm password: 
   <input type="password" name="cpassword" id='cpsd'  >
   <span class="cpsd error"></span> <br>
    <input type="submit" name='sp'  value='signup'>   
</form>

<?php
include('config.php');
if(isset($_POST['sp'])){
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $uname=$_POST['username'];
 $psd=$_POST['password'];
 $cpsd=$_POST['cpassword'];
$vcode=bin2hex(random_bytes(8));
$sql="INSERT INTO `project1` (`id`, `fname`, `lname`, `username`, `password`, `cpassword`,`vcode`,`varified`) VALUES (NULL, '$fname', '$lname', '$uname', '$psd', '$cpsd','$vcode','0')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('signup successful');
    window.location.href='http://localhost/projects/POS_project1/login.php';
    </script>";
}else {
    echo "<script> alert('signup failed');
    window.location.href='http://localhost/projects/POS_project1/signup.php';
   </script>";
}
}
?>



<p> if you have already account <a href="login.php">Login </a> here</p>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
<script>
 $(document).ready(function(){
 $("#form").submit(function(){
 
 var txt=/^[A-Z a-z]+$/;

    var fname=$("#fname").val();
    var lname=$('#lname').val();
    var uname=$('#username').val();
    var psd=$("#psd").val();
    var cpsd=$("#cpsd").val();
    
    if(fname==''){
        $(".fname").text("please fill all required fields");
        return false;
    }else{
        $(".fname").text('');
    }
    if(!fname.match(txt)){
        $(".fname").text("only letters are allowed");
        return false;
    }else{
        $(".fname").text('');
    }
    if(lname==''){
        $(".lname").text("please fill all required fields");
        return false;
    }else{
        $(".fname").text('');
    }
    if(!lname.match(txt)){
        $(".lname").text("only letters are allowed");
        return false;
    }else{
        $(".lname").text('');
    }
    if(uname==''){
        $(".username").text("please fill all required fields");
        return false;
    }else{
        $(".username").text('');
    }
    if(psd==''){
        $(".psd").text("please fill all required fields");
        return false;
    }
    if(cpsd==''){
        $(".cpsd").text("please fill all required fields");
        return false;
    }
});
 }) 
</script>
 </body>
 </html> 