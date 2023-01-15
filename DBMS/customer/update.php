<?php

if(isset($_POST['update']))
{
    
include('connect.php');
   
   $CustomerID = $_POST['CustomerID'];
   $LastName = $_POST['LastName'];
   $FirstName = $_POST['FirstName'];
   $ContactNo = $_POST['ContactNo'];
   $Email = $_POST['Email'];
           
   $query = "UPDATE `customer` SET `LastName`='".$LastName."', `FirstName`= '".$FirstName."',`ContactNo`= '".$ContactNo."',
    `Email`= '$Email' WHERE `CustomerID` ='$CustomerID'";
   
   $result = mysqli_query($conn, $query);
   
   header('location:customer.php');
}

?>
