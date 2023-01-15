<!DOCTYPE html> <!-- The new doctype -->
<html>

    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Customer</title>
        
        <link rel="stylesheet" type="text/css" href="styles.css" />
        


    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->

		  <!-- <img src="logo.png" height="50px" width="50px" alt=”site’s logo”> <h3>Computer Parts Store</h3>  -->   
    
            <header> <!-- Defining the header section of the page with the appropriate tag --> 
           
                            
							  <img src="logo2.png" height="80" width="200" alt=”site’s logo”>
                
				<nav class="clear"> <!-- The nav link semantically marks your main site navigation -->
				  
                    <ul>
					    <li><a href="template.html">Home</a></li>
                        <li><a href="customer.php">Customer</a></li>         
						 <li><a href="orderdetail/orderdetail.php">Order</a></li>
				        <li><a href="#article4">Product</a></li>				
						<li><a href="#article2">Supply</a></li> 						  
						<li><a href="#article4">Transactions</a></li>
                    </ul>
                </nav>
            
            </header>
			   
            <div class="line"></div>
<body>
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">ORDER</h4>
  <div class="banner">
    <div class="container p-5">
    <h5 class="pb-4"></h5>
   <div class="card mx-3 mt-n5 shadow-lg" style="border-radius:0px; border:none">
    <div class="card-body p-5">
	<center>
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">ORDER DETAILS</h4>
</center>
      <form>
        <div class="row">
        
            <div class="col">
            <div class="form-floating mb-3">
			
			
        
		  
        </div>
      
      </form>
	
	
	
	 <form align="center" action="add.php" method="post">

      <h3 align="center"><font color="#1C2833"><I>Please enter the following information:</I></font></h2>
          <p><label for="OrderID"><font color="#1C2833" size="4">Order Detail: </font></label>
          <input type="text" id="OrderID" name="OrderID" placeholder="Enter Order ID" required></p>
          <p><font color="#1C2833" size="4">Customer ID: </font>
          <input type="text" id="CustomerID" name="CustomerID" placeholder="Enter Customer ID" required></p>
          <p><font color="#1C2833" size="4">Product ID: </font>
          <input type="text" id="ProductID" name="ProductID" placeholder="Enter Product ID"  required></p>
          <p><font color="#1C2833" size="4">Order Amount: </font>
          <input type="text" id="OrderAmount" name="OrderAmount" placeholder="Enter Order Amount"  required></p>
          <p><font color="#1C2833" size="4">Delivery Address: </font>
          <input type="text" id="DeliveryAddress" name="DeliveryAddress" placeholder="Enter Delivery Address"  required></p>
          <p><font color="#1C2833" size="4">Delivery Status: </font>
          <input type="text" id="DeliveryStatus" name="DeliveryStatus" placeholder="Enter Delivery Status"  required></p>
          <p><font color="#1C2833" size="4">Payment Option: </font>
          <input type="text" id="PaymentOption" name="PaymentOption" placeholder="Enter Payment Option"  required></p>
      <p><input type="submit" value="SUBMIT"> <input type="reset" value="RESET"></p>
	
	
	
	
	
	
	
    </div>
  </div>
</div>
</div>
      <div class="line"></div>
	        <div class="line"></div>
<CENTER>
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">LIST</h4>
</center>
      <form>
        <div class="row">
        
            <div class="col">
            <div class="form-floating mb-3">
			
			<?php
   include('connect.php');
    
    $sql="select * from orderdetail";
    $result= mysqli_query($conn, $sql) or die("Bad Query: $sql");

    echo "<center><table border='1' align='center'></center>";
    echo "<tr>
	<td>Order ID</td><td>Customer ID</td><td>Product ID</td><td>Order Amount</td><td>Delivery Address</td><td>Delivery Status</td><td>Payment Option</td></tr>";
   while($row= mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['OrderID']}</td><td>{$row['CustomerID']}</td><td>{$row['ProductID']}</td>
    <td>{$row['OrderAmount']}</td><td>{$row['DeliveryAddress']}</td><td>{$row['DeliveryStatus']}</td><td>{$row['PaymentOption']}</td></tr>";
   }
   echo "</table>";
   ?>   

        </div>
      
      </form>

      
</form>

<form align="center" action="delete.php" method="get">

    <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">DELETE</h4>
        <h3 align="center"><font color="#1C2833"><I>To delete, please enter the following information:</I></font></h2>
        <p><label for="OrderIDdelete"><font color="#1C2833" size="4">OrderID: </font></label>
          <input type="text" id="OrderIDdelete" name="OrderIDdelete" placeholder="Enter Order ID" required></p>
         <div> <input type="submit" value=" DELETE "></div>
        </p>
  </form>
	
   
     
  </form>
    </div>
  </div>
  <div class="line"></div>
  
  
   <form align="center" action="update.php" method="post">
      <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">UPDATE</h4>
      <h3 align="center"><font color="#1C2833"><I>Please enter the OrderID of the information to update:</I></font></h3>
          <p><label for="OrderID"><font color="#1C2833" size="4">Order ID: </font></label>
          <input type="text" id="OrderID" name="OrderID" placeholder="Enter Order ID" required></p>
          <h3 align="center"><font color="#1C2833"><I>Please enter the updated information:</I></font></h3>
          <p><font color="#1C2833" size="4">Customer ID </font>
          <input type="text" id="CustomerID" name="CustomerID" placeholder="Enter Customer ID" required></p>
          <p><font color="#1C2833" size="4">Product ID: </font>
          <input type="text" id="ProductID" name="ProductID" placeholder="Enter Product ID"  required></p>
          <p><font color="#1C2833" size="4">Order Amount: </font>
          <input type="number" id="OrderAmount" name="OrderAmount" placeholder="Enter Order Amount"  required></p>
          <p><font color="#1C2833" size="4">Delivery Address </font>
          <input type="text" id="DeliveryAddress" name="DeliveryAddress" placeholder="Enter Delivery Address"  required></p>
          <p><font color="#1C2833" size="4">Delivery Status </font>
          <input type="number" id="DeliveryStatus" name="DeliveryStatus" placeholder="Enter Delivery Status"  required></p>
          <p><font color="#1C2833" size="4">Payment Option </font>
          <input type="text" id="PaymentOption" name="PaymentOption" placeholder="Enter Payment Option"  required></p>
          
          <p><input type="submit" name="update" value="UPDATE"> <input type="reset" value="RESET"></p>
  </form>
  
  
 <form align="center" action="query.php" method="post">
 <h4 class="card-title mb-3 text-dark text-uppercase" style="font-weight:700">SEARCH</h4>
      <h3 align="center"><font color="#1C2833"><I>Enter the OrderID you wish to check:</I></font></h3>
          <p><label for="OrderID"><font color="#1C2833" size="4">Order ID: </font></label>
          <input type="text" id="OrderID" name="OrderID" placeholder="Order ID"></p>
          <p><div><input type="submit" value="CHECK"> </div>
          
        
  </form>
        
  </form>
  </form>
</div>
</div>


</body>
	
	
	
	
	
	
	
	
	
	
	
	

        <footer> <!-- Marking the footer section -->
        <div class="line"></div>
             <a href="#" class="up">GROUP6</a>
  <style>
  

    #clock {
      height: 5vh;
      width: 15%;
      background-color: linear-gradient(to bottom right,white, rgb(240, 65, 65));
      color: #000;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
    }
  </style>
	
           <div id="clock">
  </div>
  <script>
      function clock() {
      let date = new Date();
      let hrs = date.getHours();
      let mins = date.getMinutes();
      let secs = date.getSeconds();
      let period = "AM";
    
      if (hrs == 0) hrs = 12;
      if (hrs > 12) {
        hrs = hrs - 12;
        period = "PM";
      }
    
      hrs = hrs < 10 ? `0${hrs}` : hrs;
      mins = mins < 10 ? `0${mins}` : mins;
      secs = secs < 10 ? `0${secs}` : secs;
    
      let time = `${hrs}:${mins}:${secs} ${period}`;
      setInterval(clock, 1000);
      document.getElementById("clock").innerText = time;
    }
    
    clock();

  </script>
         
           
           

        </footer>
            
		</section> <!-- 
	 -->
    </body>
</html>



