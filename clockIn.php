<?php

$staffID = $_GET["staffID"];

if ($staffID != "") {
    echo 'You have clocked in :)';
} else {
    echo 'Invalid card';
}

?>