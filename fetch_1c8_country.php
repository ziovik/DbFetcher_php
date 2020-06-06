<?php
include("inc/db.php");
if (isset($_POST["query"])) {

    $query = $con->query("SELECT * FROM countries WHERE country_id = ".$_POST['query']." ");
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
        }
    }
}else {
    $query = $con->query("SELECT * FROM countries  ");
    $rowCount = $query->num_rows;
    if($rowCount > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
        }
    }
}
