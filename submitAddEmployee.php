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
    }
    
    $conn->close();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $passHash = hash("sha512", "000000");

    $sql = "INSERT INTO pws (staffID, passHash, locked)
    VALUES ('$staffID', '$passHash', '')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }

    $conn->close();

    $to = $emailInp;
    $subject = 'Account Created for GMPAUTO';
    $from = 'mark@gmpauto.co.uk';
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h1 style="color:#f40;">Hi '.$sname.'!</h1>';
    $message .= '<p style="color:#080;font-size:18px;">Your new password for GMPAUTO is 000000</p>';
    $message .= '</body></html>';
    
    // Sending email
    if(mail($to, $subject, $message, $headers)){
        echo '';
    }

?>