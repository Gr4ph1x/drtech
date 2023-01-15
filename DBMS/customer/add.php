<?php
include('connect.php');
    $CustomerID=$_POST['CustomerID'];
    $LastName=$_POST['LastName'];
    $FirstName=$_POST['FirstName'];
    $ContactNo=$_POST['ContactNo'];
    $Email=$_POST['Email'];
    $sql=mysqli_query($conn,"insert into customer(CustomerID,LastName,FirstName,ContactNo,Email)
    values('$CustomerID','$LastName','$FirstName','$ContactNo','$Email')");
    header('location:customer.php');

   ?>