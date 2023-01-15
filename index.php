
<!DOCTYPE html> <!-- The new doctype -->
<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Coding A CSS3 &amp; HTML5 One Page Template | Tutorialzine demo</title>
        
        <link rel="stylesheet" type="text/css" href="styles.css" />
        
     
        
    </head>
    
    <body>
    	
    	<section id="page"> <!-- Defining the #page section with the section tag -->
    
            <header> <!-- Defining the header section of the page with the appropriate tag -->
            
                <hgroup>
                    <h1>LOGO</h1>
                    <h3>Computer Parts Store</h3>
                </hgroup>
                                
                <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->
                    <ul>
					<li><a href="inventory/index.php" target="_blank">Home</a></li>
                        <li><a href="studentform.php">Inventory</a></li>
                        <li><a href="#article2">Other</a></li>
                        <li><a href="#article3">Other1</a></li>
                    </ul>
                </nav>
            
            </header>
            
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
                <a href="index.php" class="btnReset" title="Reset search">Reset</a>
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
           
           <p>TEST PAGE</p> <!-- Change the copyright notice -->
           
           <a href="#" class="up">Exit</a>
           <a href="site.com" class="by">thanks</a>
           

        </footer>
            
		</section> <!-- Closing the #page section -->
        
      
    </body>
</html>
