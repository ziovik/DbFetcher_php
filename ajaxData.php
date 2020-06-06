<?php
include("inc/db.php");

//Include database configuration file


if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
    //Get all state (region) data
    $query = $con->query("SELECT * FROM states WHERE country_id = " . $_POST['country_id'] . " AND status = 1 ORDER BY state_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if ($rowCount > 0) {
        echo '<option value="">Выберите регион</option>';
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
        }
    } else {
        echo '<option value="">Региона нет</option>';
    }
}

// region
if (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {
    /*$result = array();

    //Get all city data
    $query = $con->query("SELECT 
                                    * 
                                 FROM
                                    cities  c
                                    
                                  WHERE state_id = " . $_POST['state_id'] . " AND status = 1 ORDER BY city_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    $cities = array();

    //Display cities list
    if ($rowCount > 0) {
        echo '<option value="" disabled selected>Выберите город</option>';
        while ($row = $query->fetch_assoc()) {
            array_push($cities, '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>');

//            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    } else {
//        echo '<option value="">Города нет</option>';
        array_push($cities, '<option value="">Города нет</option>');
    }

    array_push($result, $cities);

    //Get all area  data
    $query1 = $con->query("SELECT * FROM areas WHERE state_id = " . $_POST['state_id'] . " AND status = 1 ORDER BY area_name ASC");

    //Count total number of rows
    $rowCount1 = $query1->num_rows;
    $areas = array();

    //Display cities list
    if ($rowCount1 > 0) {
        echo '<option value="" disabled selected>Выберите Район</option>';
        while ($row1 = $query1->fetch_assoc()) {
            array_push($areas, '<option value="' . $row1['area_id'] . '">' . $row1['area_name'] . '</option>');
//            echo '<option value="'.$row1['area_id'].'">'.$row1['area_name'].'</option>';
        }
    } else {
        array_push($areas, '<option value="">Района нет</option>');
//        echo '<option value="">Района нет</option>';
    }
    array_push($result, $areas);


    $result = array("cities" => $cities, "areas" => $areas);*/


    $names = array("Daniel", "Alex");
    $cars = array("BMW", "Skoda");
    header('Content-type: application/json');
    echo json_encode(array("cars" => $cars, "names" => $names));
}


