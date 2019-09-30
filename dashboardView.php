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
                        echo '<br /><div class="container"><div class="alert alert-primary" role="alert"><h4 class="alert-heading">You are working soon!</h4><p>Your next shift starts soon: '.$startTime.' - '.$endTime.'</p><hr><p class="mb-0">Hope it goes well :P</p></div></div>';
                        $mainNotif = "done";
                    } else {
                        if ($mainNotif != "done") {
                            $noNotif = TRUE;
                        }
                    }
                } else {
                    if ($mainNotif != "done") {
                        $noNotif = TRUE;
                    }
                }
            } else {
                if ($mainNotif != "done") {
                    $noNotif = TRUE;
                }
            }
        }
    } else {
        if ($mainNotif != "done") {
            $noNotif = TRUE;
        }
    }
    $conn->close();

    if ($noNotif == TRUE) {
        echo '<br /><div class="container"><div class="alert alert-primary" role="alert"><h4 class="alert-heading">You dont have any shifts scheduled!</h4><p>Check back later</p><hr><p class="mb-0">Have a good day :P</p></div></div>';
        $mainNotif = "done";
    }

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
            <br />
            <?php

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT staffID, timeEnd, notifType, content FROM notifications ORDER BY timeEnd ASC";

                $noOutput = TRUE;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["staffID"] == $staffID) {
                            if ($row["notifType"] ==  "nextShift") {
                                $timeEndp1 = $row["timeEnd"];
                                if ( $timeEndp1-time() >=  0) {
                                    $shiftTimes = $row["content"];
                                    $startTime = date("g:ia j F", substr($shiftTimes, 0 , 10));
                                    $endTime = date("g:ia j F", substr($shiftTimes, 12 , 10));
                                    echo '<div class="card border-info mb-6" style="max-width: 20rem;"><div class="card-header">Shift</div><div class="card-body"><h4 class="card-title">You are working</h4><p class="card-text">Your next shift is: '.$startTime.' - '.$endTime.'</p></div></div>';
                                    $noOutput = FALSE;
                                }
                            }
                        }
                    }
                }
                $conn->close();
                if ($noOutput == TRUE) {
                    echo "<br /><h6>There are no notifications that require your attention</h6>";
                }

            ?>
        </div>
        <div class="tab-pane fade" id="roster">
            <p>This is where the roster will be.</p>
        </div>
    </div>
</div>