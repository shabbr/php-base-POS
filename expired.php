<?php
include('config.php');
$exp=date('Y-m-d H:i:s');
$sql="SELECT * from products where  `date`<'$exp'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<h3>".$row['product name']."  expired on ".$row['date']."</h3>";
    }
}else{
    echo "no expired product";
}

?>