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
    .tb{
        margin:8% 15% 0% 15%;
        width:70%;
    }
    table tr td a{
        text-decoration:none;
        color:black;
    }
    h4{
        margin-left:15%;
        margin-top:3%;
    }
    .float{
      
        display:flex;
        margin-right:10%;
    }
  </style>
  </head>
  <body>
  <h2 class=" m-2">Expenses</h2>
<hr>
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
    <form action="expense_form.php"  method="post">
        <button type="submit" class="btn btn-primary m-3">Add Expenses</button>
    </form>
    <div class="float">
    <form action="" method='post'>
      Date From:
        <input type="date" name='start' >
       Date To:
            <input type="date" name="end">
       <button type="submit" name='filter' class="btn btn-primary m-3">filter</button>
    </form>
</div>
  </body>
</html>

<?php



//for show table data
include('config.php');
if(!isset($_POST['filter'])){
$sql="SELECT * FROM `expense`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
echo "<table border=1 class='tb' width='50%'> <tr>
<th>Expense Type</th>
<th>Amount</th>
<th>Expense Date</th>
<th>Operations</th>
</tr>";
$total=0;
while($row=mysqli_fetch_assoc($result)){
    echo '<tr>
    <td>'.$row['expense type'].'</td>
    <td>'.$row['amount'].'</td>
    <td>'.$row['expense date'].'</td>
    <td>
     <a href="expense_update.php?id='.$row['id'].'">Edit</a> 
    <a href="expense_delete.php?id='.$row['id'].'">Delete</a>
    </td>
    </tr>';
    $total=$total+$row['amount'];

}
echo "</table>";
echo "<h4>Tatal Expenditures are: " .$total."-Rs</h4>";
}
}









//for filter
 
if(isset($_POST['filter'])){

    $start_d=$_POST['start'];
    $end_d=$_POST['end'];
    //convert string into object
  $start=new DateTime($start_d);
  $end=new DateTime($end_d);
    $sql1 = "SELECT * FROM `expense` WHERE `expense date` BETWEEN       '" . $start->format('y-m-d') . "'       AND      '".$end->format('y-m-d')."'     ";
    $result1 = mysqli_query($conn, $sql1);
    $num=mysqli_num_rows($result1);

if($num>0){
    echo "<table border=1 class='tb' width='50%'> <tr>
    <th>Expense Type</th>
    <th>Amount</th>
    <th>Expense Date</th>
    <th>Operations</th>
    </tr>";
    $price=0;
    while($row=mysqli_fetch_assoc($result1)){
        echo '<tr>
        <td>'.$row['expense type'].'</td>
        <td>'.$row['amount'].'</td>
        <td>'.$row['expense date'].'</td>
        <td>
         <a href="expense_update.php?id='.$row['id'].'">Edit</a> 
        <a href="expense_delete.php?id='.$row['id'].'">Delete</a>
        </td>
        </tr>';
        $price=$price + $row['amount'];
    
    }
    echo "</table>";
    echo "<h4>Tatal Expenditures are: " .$price."-Rs</h4>";
  
}else{
  echo "<h3>Not Found</h3>";
}
}

?>  