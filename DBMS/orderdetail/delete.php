<?php
$id=$_GET['OrderIDdelete'];
include('connect.php');
$sql=mysqli_query($conn,"delete from transaction where OrderID='$id'");
header('location:transaction.php');
?>