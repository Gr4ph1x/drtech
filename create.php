<?php
    // Delete Table data
    if (isset($_POST["btnSave"])) {
        // Connect to the database
        require_once "connection.php";

        $name    = $con->real_escape_string($_POST["txtName"]);
        $email   = $con->real_escape_string($_POST["txtName"]);
        $contact = $con->real_escape_string($_POST["txtContact"]);

        if ($stmt = $con->prepare("INSERT INTO `products`(`product`, `specs`, `description`) VALUES (?, ?, ?)")) {
            $stmt->bind_param("sss", $name, $email, $contact);
            $stmt->execute();
            $stmt->close();
            $msg = '<div class="msg msg-create">Contact details saved successfully.</div>';
        } else {
            $msg = '<div class="msg">Prepare() failed: '.htmlspecialchars($con->error).'</div>';
        }

        // Close database connection
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(isset($msg)){ echo $msg; }?>
    <main class="container">
        <div class="wrapper">
          
        </div>
        <div class="wrapper">
            <div class="title create">
                <h2>ADD PRODUCT</h2>
                <hr>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="frmCreate">
                <input type="text" name="txtName" placeholder="product" required>
                <input type="text" name="txtName" placeholder="specs" required>
                <input type="number" min="0" name="txtContact" placeholder="description" required>
                <div class="btnWrapper">
                    <button type="submit" name="btnSave" title="Save contact details">Save</button>
                    <a href="template.html" class="btnHome" title="Return back to homepage">Home</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>