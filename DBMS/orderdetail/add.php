<?php
include('connect.php');
    $OrderID=$_POST['OrderID'];
    $CustomerID=$_POST['CustomerID'];
    $ProductID=$_POST['ProductID'];
    $OrderAmount=$_POST['OrderAmount'];
    $DeliveryAddress=$_POST['DeliveryAddress'];
    $DeliveryStatus=$_POST['DeliveryStatus'];
    $PaymentOption=$_POST['PaymentOption'];
    $sql=mysqli_query($conn,"insert into orderdetail(OrderID,CustomerID,ProductID,OrderAmount,DeliveryAddress,DeliveryStatus,PaymentOption)
    values('$OrderID','$CustomerID','$ProductID','$OrderAmount','$DeliveryAddress','$DeliveryStatus','$PaymentOption')");
    header('location:orderdetail.php');
?>