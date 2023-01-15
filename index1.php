<!DOCTYPE html> <!-- The new doctype -->
<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>INVENTORY</title>
        
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
                        <li><a href="index1.php">Inventory</a></li>
                        <li><a href="#article2">Other</a></li>
                        <li><a href="#article3">Other1</a></li>
                    </ul>
                </nav>
            
            </header>
            <div class="line"></div>
  <body>

	  <body>
  
  <?php
    // Connect to the database
    require_once "connection.php";

    // Delete Table data
    if (isset($_GET["del"])) {
        $id = preg_replace('/\D/', '', $_GET["del"]); //Accept numbers only
        if ($stmt = $con->prepare("DELETE FROM `products` WHERE `id`=?")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
            $msg = '<div class="msg msg-delete">Contact details deleted successfully.</div>';
        } else {
            die('prepare() failed: ' . htmlspecialchars($con->error));
        }
    }

    // Display Table data
    $tabledata = "";
    $sqlsearch = "";
    if (isset($_POST["btnSearch"])) {
        $keywords = $con->real_escape_string($_POST["txtSearch"]);
        $searchTerms = explode(' ', $keywords);
        $searchTermBits = array();
        foreach ($searchTerms as $key => &$term) {
            $term = trim($term);
            $searchTermBits[] = " `product` LIKE '%$term%' OR `specs` LIKE '%$term%' OR `description` LIKE '%$term%'";
        }
        $sqlsearch = " WHERE " . implode(' AND ', $searchTermBits);
    }

    if ($stmt = $con->prepare("SELECT * FROM `products` $sqlsearch")) {
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tabledata .= '<tr>
                                <td>'.$row["product"].'</td>
                                <td>'.$row["specs"].'</td>
                                <td>'.$row["description"].'</td>
                                <td>
                                    <a href="update.php?id='.$row["id"].'" class="btnAction btnUpdate" title="Update contact details">&#9998;</a>
                                    <a href="index.php?del='.$row["id"].'" class="btnAction btnDelete" title="Delete contact details">&#10006;</a>
                                </td>
                            </tr>';
            }
        } else {
            $tabledata= '<tr><td colspan="4" style="text-align: center; padding:30px 0;">Nothing to display</td></tr>';
        }

        $stmt->close();
    } else {
        die('prepare() failed: ' . htmlspecialchars($con->error));
    }

    // Close database connection
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testpage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(isset($msg)){ echo $msg; }?>
    <main class="container">
        <div class="wrapper">
        </div>
        <div class="wrapper">
            <a href="create.php" class="btnCreate" title="ADD NEW PRODUCT">Add product</a>
        </div>
        <div class="wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="txtSearch" value="<?php if(isset($keywords)){ echo $keywords; }?>" title="Input keywords here" required>
                <button type="submit" name="btnSearch" class="btnSearch" title="Search keywords">Search</button>
                <a href="index1.php" class="btnReset" title="Reset search">Reset</a>
            </form>
        </div>
        <div class="wrapper">
            <table>
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>SPECS</th>
                        <th>DESCRIPTION</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo $tabledata;
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

	
	
	
	
	
	
	
	
	
	
	
	
	
	

        <footer> <!-- Marking the footer section -->

           <div class="line"></div>
             <a href="#" class="up">Zubir Malik Ghulam</a>
  <style>
  

    #clock {
      height: 5vh;
      width: 15%;
      background-color: #000000;
      color: #084509;
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
            
		</section> <!-- Closing the #page section -->
    </body>
</html>
