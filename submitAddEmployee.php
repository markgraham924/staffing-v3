<?php

    $servername = "160.153.131.192";
    $username = "adminStaff";
    $password = "U76?m+_zW*}n";
    $dbname = "staffing";

    $staffID = $_POST["staffID"];
    $fname = $_POST["fname"];
    $sname = $_POST["sname"];
    $position = $_POST["position"];
    $emailInp = $_POST["emailInp"];
    $phoneInp = $_POST["phoneInp"];


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO emps (staffID, fname, sname, position, emailInp, phoneInp)
    VALUES ('$staffID', '$fname', '$sname', '$position', '$emailInp', '$phoneInp')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>