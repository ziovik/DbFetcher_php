<?php
include("inc/db.php");
include("objects/bank.php");

if (isset($_POST['bank_name'])) {
    $bank_name = $_POST['bank_name'];  //as bank NAME
    echo  "<script>alert('$bank_name')</script>";
    $sql = "select * from _Reference13 where _Description ='$bank_name'";
    $result = mysqli_query($con, $sql);
    $bank = null;
    while ($rows = mysqli_fetch_array($result)) {
        $bank_id = $rows['id'];
        $bank_name = $rows['_Description'];
        $bank_corres = $rows['_Fld1146'];
        $city = $rows['_Fld1147'];
        $address = $rows['_Fld1148'];
        $telephone = $rows['_Fld1149'];
        $bank = new bank($bank_id,  null , null , $bank_name ,$bank_corres, $city, $address, $telephone);
    }
    print_r(json_encode($bank));
}