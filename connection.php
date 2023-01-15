<?php
    // Enable error reporting for mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    // Hostname
    $host = "localhost";

    // Username
    $user = "root";

    // Password
    $pass = "";

    // Database Name
    $db   = "inventory";


    $con = new mysqli("localhost:3308","root","","inventory");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }