<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Order Detail</title>
        
        <link rel="stylesheet" type="text/css" href="styles.css" />
        

        
    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->

		  <!-- <img src="logo.png" height="50px" width="50px" alt=”site’s logo”> <h3>Computer Parts Store</h3>  -->   
    
            <header> <!-- Defining the header section of the page with the appropriate tag -->
            
          
                 <br>
				 <br>
				 <br>
               
            <hgroup>
                 <img src="logo2.png" height="80px" width="250x" alt=”site’s logo”>
                </hgroup>
                                
                <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->
                    <ul>
					              <li><a href="template.html">Home</a></li>
                        <li><a href="#article2">Products</a></li>
                        <li><a href="#article3">Cart</a></li>
                        <li><a href="#article4">About</a></li>
                    </ul>
                </nav>
            
            </header>
            <div class="line"></div>
  <body align="center">
    <br>
    <br>
<?php
include('connect.php');

$OrderID = $_POST['OrderID'];
    
    $sql="select * from orderdetail where OrderID='$OrderID'";
   if ($result= mysqli_query($conn, $sql)){
    
    while ($row= mysqli_fetch_assoc($result)){
    echo "<center><table border='1' allign='center'></center>";
    echo "<tr><td>OrderID</td>";
    echo "<td>{$row['OrderID']}</td><br>";
    echo "<tr><td>CustomerID</td><td>{$row['CustomerID']}</td><br>";
    echo "<tr><td>ProductID</td><td>{$row['ProductID']}</td><br>";
    echo "<tr><td>OrderAmount</td><td>{$row['OrderAmount']}</td><r>";
    echo "<tr><td>DeliveryAddress</td><td>{$row['DeliveryAddress']}</td></tr>";
    echo "<tr><td>DeliveryStatus</td><td>{$row['DeliveryStatus']}</td></tr>";
    echo "<tr><td>PaymentOption</td><td>{$row['PaymentOption']}</td></tr>";
    echo "</table>";}
   }
   
   else
   { echo "<p>No records matching your query were found.</p>";}
   ?>
   
  

<a href="orderdetail.php">Home</a>
</body>
</html>