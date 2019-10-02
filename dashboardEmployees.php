<?php

    $servername = "160.153.131.192";
    $username = "adminStaff";
    $password = "U76?m+_zW*}n";
    $dbname = "staffing";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT emps.staffID, emps.fname, emps.sname, emps.emailInp, emps.phoneInp, positions.posName FROM emps INNER JOIN positions ON positions.positionID=emps.position";
    $result = $conn->query($sql);

    $staffID = array();
    $fname = array();
    $sname = array();
    $emailInp = array();
    $phoneInp = array();
    $position = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($staffID, $row["staffID"]);
            array_push($fname, $row["fname"]);
            array_push($sname, $row["sname"]);
            array_push($emailInp, $row["emailInp"]);
            array_push($phoneInp, $row["phoneInp"]);
            array_push($position, $row["posName"]);
        }
    }
    $conn->close();

    $noEmps = count($staffID);

    echo '<br /><div class="container"><nav class="navbar navbar-expand-lg navbar-dark bg-primary"> <a class="navbar-brand" href="#">'.$noEmps.' Employees</a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <div class="collapse navbar-collapse" id="navbarColor01"> <ul class="navbar-nav mr-auto"> <li class="nav-item"> <button class="btn btn-primary my-2 my-sm-0" type="submit" onclick="addEmployee()">Add Employee</button> </li><li class="nav-item"> <a class="nav-link" href="#">Import</a> </li><li class="nav-item"> <a class="nav-link" href="#">Export</a> </li></ul> <form class="form-inline my-2 my-lg-0"><input class="form-control mr-sm-2" type="text" placeholder="Search" onkeyup="searchStaff(this.value)"></div></nav></div>'

?>

<script>
    function searchStaff(str) {
        if (str.length == 0) {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table table-hover").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "searchStaff.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<br />
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr class="table-info">
                <th scope="row">Name</th>  
                <td>Position</td> 
                <td>Email</td>
                <td>Phone</td>
                <td>Options</td>
            </tr>
        </thead>
        <?php

            for ($x = 0; $x < $noEmps; $x++) {
                
                echo '<td>'.$fname[$x].' '.$sname[$x].'</td><td><a href="">'.$position[$x].'</a></td><td>'.$emailInp[$x].'</td><td>'.$phoneInp[$x].'</td><td><button type="button" class="btn btn-primary btn-sm">...</button></td></tr>';
            }

        ?>
    </table>
</div>