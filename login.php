<?php

    $servername = "160.153.131.192";
    $username = "adminStaff";
    $password = "U76?m+_zW*}n";
    $dbname = "staffing";

    $staffID = $_POST["staffID"];
    $passInp = $_POST["passInp"];

    //hashing the password with sha512

    $passHash = hash("sha512", $passInp);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT staffID, passHash, locked FROM pws";
    $result = $conn->query($sql);

    $login = FALSE;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["staffID"] == $staffID) {
                if ($row["passHash"] == $passHash) {
                    if ($row["locked"] != "1") {
                        $login = TRUE;
                    }
                }
            }
        }
    }
    $conn->close();

    if ($login == TRUE) {
        $_SESSION["login"] = TRUE;
        $_SESSION["staffID"] = $staffID;
    } else {
        $_SESSION["login"] = FALSE;
    }

?>