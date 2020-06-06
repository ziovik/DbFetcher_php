<?php
include("inc/db.php");
if (isset($_POST["query"])) {

    $query = $con->query("SELECT * FROM states WHERE state_id = ".$_POST['query']." ");
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
        }
    }
}else {
    $query = $con->query("SELECT * FROM states  ");
    $rowCount = $query->num_rows;
    if($rowCount > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
        }
    }
}
