<?php

if(isset($_POST['update']))
{
    
include('connect.php');
   
   $OrderID = $_POST['OrderID'];
   $CustomerID = $_POST['CustomerID'];
   $ProductID = $_POST['ProductID'];
   $OrderAmount = $_POST['OrderAmount'];
   $DeliveryAddress = $_POST['DeliveryAddress'];
   $DeliveryStatus = $_POST['DeliveryStatus'];
   $PaymentOption = $_POST['PaymentOption'];
   $query = "UPDATE `orderdetail` SET `CustomerID`= '".$CustomerID."',
   `ProductID`= '".$ProductID.",`OrderAmount`= '".$OrderAmount.",`DeliveryAddress`= '".$DeliveryAddress."',
   `DeliveryStatus`= '".$DeliveryStatus.",`PaymentOption`= '".$PaymentOption.",WHERE `OrderID` ='$OrderID'";
   
   $result = mysqli_query($conn, $query);
   
   header('location:orderdetail.php');
}

?>
