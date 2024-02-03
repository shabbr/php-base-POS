<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>

<?php
include('config.php');
$id=$_GET['id'];
$sql="SELECT * FROM `expense` where id=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $et=$row['expense type'];
    $am=$row['amount'];
    $ed=$row['expense date'];

}





//insert new data
if(isset($_POST['submit'])){
    $et=$_POST['et'];
    $am=$_POST['am'];
    $ed=$_POST['ed'];
    $sql="UPDATE `expense` SET `expense type` = '$et', `amount` = '$am', `expense date` = '$ed' WHERE `expense`.`id` = $id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script> alert('Espense updated');
        window.location.href='http://localhost/projects/POS_project1/expense_manage.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    
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
    
<form method="post">
  <div class="form-group">
    <label >Expense type</label>
    <input type="text" value="<?php echo $et ?>" name="et" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label >Amount</label>
    <input type="text" value="<?php echo $am ?>" name="am" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Expense Date</label>
    <input type="date" value="<?php echo $ed ?>" name="ed" class="form-control"  >
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

  </body>
</html>