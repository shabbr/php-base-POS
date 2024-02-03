<?php
include('config.php');
session_start();
session_unset();
session_destroy();
echo "<script>alert('logout successfully');
   window.location.href='http://localhost/projects/POS_project1/login.php';
  </script>";


?>