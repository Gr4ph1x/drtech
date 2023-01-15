<?php
$id=$_GET['CustomerIDdelete'];
include('connect.php');
$sql=mysqli_query($conn,"delete from customer where CustomerID='$id'");
header('location:customer.php');
?>