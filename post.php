<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:http://localhost/projects/POS_project1/login.php");
}
 
?>


<?php
echo "user page";
echo '<br><br><br>';
echo '<a href="logout.php">Logout</a>';
echo '<br><br><br>';
echo "<a href='dumy.php'>dumy</a>";
echo '<br><br><br>';
echo "<a href='dumy1.php'>dumy1</a>";
?>