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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 
  <style>
#tb{
  width:60%;
  float:right;
  border:1px solid black;
}
.float{
  float:left;
  margin:3%;
}







.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }









  </style>
 
  
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <form method='post'>
  <div class="form-group ml-5 mr-5">
    <label for="exampleInputEmail1">customer name</label>

    <input type="text" name="cname" required class="form-control" id="exampleInputEmail1" >
    <label for="exampleInputEmail1">customer cell</label>
    <input type="text" name="cnum"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    salesman
    <input type="text" name="sman" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

received <br>
<input type="text" name='received' required >
<br> <br>
    <!-- <button type="submit" name='hold'  class="btn btn-primary col float-right mt-3">Hold me</button> -->
    <button type="submit" name='csubmit'  class="btn btn-primary col float-right mt-3">Submit me</button>
  </div>
</form>















 
<br><br>
  <form action="" id='pform' method='post'>
  <div class='float'>
    product name <br>

    <select name='pname' id='select' required>
    <?php  
    include('config.php');
    $sql5 = "SELECT `product name` FROM `products` ";
    $result5 = mysqli_query($conn, $sql5);
$num=mysqli_num_rows($result5);
if($num>0){
 echo ' <option value=""></option>';
    while ($row5 = mysqli_fetch_assoc($result5)) {
       echo '<option value="' . $row5['product name'] . '">' . $row5['product name'] . '</option>';
      $pna=$row5['product name'];
    }} 
  ?> 
</select><br>

Price  <br>
<input type="text" name='price'  id='select_price'> <br>
quantity <br>
<input type="text" name='qty' id="qnty" required><br>
<span id='span'> </span>
<button type="submit" name='psubmit' id='psubmit' class="btn btn-primary">Submit</button>
</div>
</form>
<br>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>



$(document).ready(function(){
  $("#select").on('change',function(){
 var pns=$(this).val();
    $.ajax({
      url:'billing_price.php',
      type:'post',
      data:{success: pns},
      success:function(response){
        console.log("AJAX Response:", response);
        $("#select_price").val(response);
      }
    })
  })



//ajax for quantity is available in db or not
$("#qnty").on('keyup',function(){
  var qnty=$(this).val();
  if(qnty.length==0)
  {
   return false;
  }
  // pick val of pname
  var na=$("#select").val();
  var psubmit=$("#psubmit");
  $.ajax({
    url:"billing_qty_cahnge.php",
    type:'post',
    data:{success:qnty,name:na},
    success:function(data){
      console.log( data);
      // alert(data);
      // console.log("length is :", data.length);
 //data in this if() only matches to  var response.In string case it will never works
if (data ==0) {
  $("#span").text('this quantity is not available');
    psubmit.prop('disabled', true); // Disable submit button
} else {
  $("#span").text('');
  psubmit.prop('disabled', false);
}
    }
  })
})

})
</script>
</body>            
</html>





<?php
include('config.php');
// $status='pending';
// echo 'dsd'.$status;
$total_price='';
if(isset($_POST['psubmit'])){
$pname=$_POST['pname'];
$price=$_POST['price'];
$qty=$_POST['qty'];

$sql7="SELECT * FROM `product_detail` where `product name`='$pname'";
$result7=mysqli_query($conn,$sql7);
if(mysqli_num_rows($result7)>0){
  $row2=mysqli_fetch_assoc($result7);
  // $newreceived = (int)$row2['received'] + (int)$received;
  $newqty=$row2['quantity']+$qty;
  $total_price=$price * $newqty;
  echo $total_price;
  //  $newstatus=($newreceived/$total_price)*100 ."%";


  $update="UPDATE `product_detail` SET `total_price`=(`quantity`+$qty)*$price , `quantity` = `quantity` + $qty WHERE `product name` = '$pname'";
  $result_update=mysqli_query($conn,$update);
  if($result_update ){
    $sql6="UPDATE products p
    INNER JOIN product_detail pd ON p.`product name` = pd.`product name`
    SET p.quantity = p.quantity - $qty
    WHERE p.`product name`='$pname'";
    $result6=mysqli_query($conn,$sql6);
} 

}
 else{
 $total_price=$price * $qty;

$sql1="INSERT INTO `product_detail` (`id`, `product name`, `price`, `quantity` ,`total_price`, `date`, `time`) VALUES (NULL, '$pname', '$price', '$qty','$total_price', CURRENT_DATE, CURRENT_TIME)";
$result1=mysqli_query($conn,$sql1);
if($result1){
  $sql6="UPDATE products p
  INNER JOIN product_detail pd ON p.`product name` = pd.`product name`
  SET p.quantity = p.quantity - $qty
  WHERE p.`product name`='$pname'";
  $result6=mysqli_query($conn,$sql6);

 
}
}
}




 
 
$sql2="SELECT * FROM `product_detail`";
$result2=mysqli_query($conn,$sql2);
$num=mysqli_num_rows($result2);
$discount=0;
$gt=0;
if($num>0){
 echo ' <table class="table table-hover mt-5 " id="tb">
  <thead>
    <tr>
    <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Remove</th>   
    </tr>
  </thead>';
  $total=0;

  while($row=mysqli_fetch_assoc($result2)){
    echo '  <tbody> <tr>
    <td>'.$row['product name'].'</td>
     <td>'.$row['price']."</td>
     <td>".$row['quantity']."</td>
      <td>".$row['total_price']."</td>
     <td> <a href='billing_delete.php?id=".$row['id']." &qty=".$row['quantity']."&pname=".$row['product name']."'> Remove </a></td>
   </tr> </tbody>";

   $total=$total+$row['total_price'];
  
  }

  $discount=floor($discount + (2/100)*$total);
 $gt=$total - $discount;
}
echo "</table> <h3 > total amount is :".$gt." </h3>
<h3 >Total discount is : ".$discount." </h3>";

if(isset($_POST['csubmit'])){
  $cname=$_POST['cname'];
        $cnum=$_POST['cnum'];
        $sman=$_POST['sman'];
        $received=$_POST['received'];
        $status= floor(($received/$gt)*100) ."%";
        // $status=((int)$received/(int)$total_price)*100 ."%";
        
        $_SESSION['customer_name']=$cname;
        $_SESSION['customer_num']=$cnum;
        $_SESSION['sman_name']=$sman;
  $sql3="SELECT * FROM `product_detail`";
  $result3=mysqli_query($conn,$sql3);
 $r=false;
 $num=mysqli_num_rows($result3);
 if($num>0){
  $ids = array();
  $report_cname='';
  $report_pname='';
  $report_products=0;
  $report_quantity=0;
  $report_date='';
  $report_id=rand(1,100000);
  while($row1=mysqli_fetch_assoc($result3)){
        $prname=$row1['product name'];
        $prprice=$row1['price'];
        $prqty=$row1['quantity'];
        $prtotal=$row1['total_price'];
        $prdate=$row1['date'];
        $prtime=$row1['time'];
        $ids[]=$row1['id'];
        $report_cname=$cname;;
        $report_pname=$prname;
        $report_products++;
        $report_quantity+=$prqty;    
        $sql10="INSERT INTO `reports` (`id`, `customer_name`, `product_name`, `products`, `quantity`, `date`,`report_id`) VALUES (NULL, '$report_cname', '$report_pname', '$report_products', '$report_quantity', CURDATE(),$report_id)";
        $result10=mysqli_query($conn,$sql10);
// $report_id=mysqli_insert_id($conn);
// echo $report_id;
if($result10){
        $sql="INSERT INTO `customer_detail` (`id`, `customer_name`, `customer_number`, `salesman`,`product_name`,`price`,`cquantity`,`total_price`,`date`,`time`,`grand_total`,`received`,`status`,`report_id`) 
        VALUES (NULL, '$cname', '$cnum', '$sman','$prname','$prprice' ,'$prqty','$prtotal','$prdate','$prtime',$gt,$received,'$status',$report_id)";
        $result=mysqli_query($conn,$sql);
       
}

        
  }
 
  }
if($r){

} 
  echo "<script> alert('submitted') </script>";
$ids_json=json_encode($ids);
echo "<script>
var idsArray =$ids_json ;
var baseUrl = 'http://localhost/projects/POS_project1/bill_print.php';
var url = baseUrl + '?ids=' + encodeURIComponent(JSON.stringify(idsArray));
var a= $ids_json;
window.location.href = url;
</script>";
}





  if(isset($_POST['hold'])){
    $cname=$_POST['cname'];
        $cnum=$_POST['cnum'];
        $sman=$_POST['sman'];
        $sql9="SELECT * FROM `product_detail`";
  $result9=mysqli_query($conn,$sql9);
 $num=mysqli_num_rows($result9);
 if($num>0){
  while($row1=mysqli_fetch_assoc($result9)){
        $prname=$row1['product name'];
        $prprice=$row1['price'];
        $prqty=$row1['quantity'];
        $prtotal=$row1['total_price'];
        $prdate=$row1['date'];
        $prtime=$row1['time'];
          $sql8="INSERT INTO `hold_bill` (`id`, `customer_name`, `customer_number`, `salesman`,`product name`,`price`,`cquantity`,`total_price`,`date`,`time`) 
          VALUES (NULL, '$cname', '$cnum', '$sman','$prname','$prprice' ,'$prqty','$prtotal','$prdate','$prtime')";
          $result8=mysqli_query($conn,$sql8);
          if($result8){
            echo "<script> alert('Data saved to hold_bill.') </script>";
            $sq="DELETE FROM `product_detail`";
            $res=mysqli_query($conn,$sq);
        } else {
            echo "<script> alert('Error saving data to hold_bill.') </script>";
        }
   
        // $sq="TRUNCATE TABLE `pos_project1`.` `product_detail`";
        // $res=mysqli_query($conn,$sq);
          }
        }
      }


 
 



// $sql2="SELECT * FROM `product_detail`";
// $result2=mysqli_query($conn,$sql2);
// $num=mysqli_num_rows($result2);
// $discount=0;
// $gt=0;
// if($num>0){
//  echo ' <table class="table table-hover mt-5 " id="tb">
//   <thead>
//     <tr>
//     <th scope="col">Product Name</th>
//       <th scope="col">Product Price</th>
//       <th scope="col">Quantity</th>
//       <th scope="col">Total</th>
//       <th scope="col">Remove</th>   
//     </tr>
//   </thead>';
//   $total=0;

//   while($row=mysqli_fetch_assoc($result2)){
//     echo '  <tbody> <tr>
//     <td>'.$row['product name'].'</td>
//      <td>'.$row['price']."</td>
//      <td>".$row['quantity']."</td>
//       <td>".$row['total_price']."</td>
//      <td> <a href='billing_delete.php?id=".$row['id']." &qty=".$row['quantity']."&pname=".$row['product name']."'> Remove </a></td>
//    </tr> </tbody>";

//    $total=$total+$row['total_price'];
  
//   }

//   $discount=floor($discount + (2/100)*$total);
//  $gt=$total - $discount;
// }
// echo "</table> <h3 > total amount is :".$gt." </h3>
// <h3 >Total discount is : ".$discount." </h3>";
?>