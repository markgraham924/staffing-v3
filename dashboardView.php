<?php

    $staffID = '00000';

    $servername = "160.153.131.192";
    $username = "adminStaff";
    $password = "U76?m+_zW*}n";
    $dbname = "staffing";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT staffID, timeEnd, notifType, content FROM notifications ORDER BY timeEnd ASC";

    $mainNotif = "notdone";


    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["staffID"] == $staffID && $mainNotif == "notdone") {
                if ($row["notifType"] ==  "nextShift") {
                    $timeEndp1 = $row["timeEnd"];
                    if ( $timeEndp1-time() >= 360) {
                        $shiftTimes = $row["content"];
                        $startTime = date("g:ia j F", substr($shiftTimes, 0 , 10));
                        $endTime = date("g:ia j F", substr($shiftTimes, 12 , 10));
                        echo '<br /><div class="container"><div class="alert alert-primary" role="alert"><h4 class="alert-heading">You are working soon!</h4><p>You next shift starts soon: '.$startTime.' - '.$endTime.'</p><hr><p class="mb-0">Hope it goes well :P</p></div></div>';
                        $mainNotif = "done";
                    }
                }
            }
        }
    }
    $conn->close();

?>

<!--Content below main notification-->

<br />

<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#notifications">Notifications</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#roster">Roster</a>
        </li>
    </ul>
    <div id="dashboardTab" class="tab-content">
        <div class="tab-pane fade active show" id="notifications">
            <?php

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT staffID, timeEnd, notifType, content FROM notifications ORDER BY timeEnd ASC";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["staffID"] == $staffID) {
                            if ($row["notifType"] ==  "nextShift") {
                                $timeEndp1 = $row["timeEnd"];
                                if ( $timeEndp1-time() >= 360) {
                                    $shiftTimes = $row["content"];
                                    $startTime = date("g:ia j F", substr($shiftTimes, 0 , 10));
                                    $endTime = date("g:ia j F", substr($shiftTimes, 12 , 10));
                                    echo '';
                                }
                            }
                        }
                    }
                }
                $conn->close();

            ?>
        </div>
        <div class="tab-pane fade" id="roster">
            <p>This is where the roster will be.</p>
        </div>
    </div>
</div>