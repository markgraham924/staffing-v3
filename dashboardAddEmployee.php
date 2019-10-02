<br />
<div class="container">
    <div class="row">
        <div class="col">
            <input required type="text" class="form-control" placeholder="First name" name="fname" id="fname">
        </div>
        <div class="col">
            <input required type="text" class="form-control" placeholder="Last name" name="sname" id="sname">
        </div>
    </div>
    <br />
    <div class="form-group">
        <input required type="text" class="form-control" placeholder="Staff ID" name="staffID" id="staffID">
    </div>
    <div class="form-group">
        <input required type="email" class="form-control" id="emailInp" aria-describedby="emailHelp" placeholder="Enter email" name="emailInp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <input required type="text" class="form-control" id="phoneInp" placeholder="Enter phone" name="phoneInp">
    </div>

    <div class="form-group">
        <input required list="positions" class="form-control" id="position" placeholder="Select Position" name="position">
    </div>
    <button type="submit" class="btn btn-primary" onclick="submitAddEmployee()">Submit</button>
</div>


<?php


    echo '<datalist id="positions">';

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

    $sql = "SELECT positionID, posName FROM positions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<option value="'.$row["positionID"].'">'.$row["posName"].'</option>';
        }
    }
    $conn->close();

    echo '</datalist>';

?>