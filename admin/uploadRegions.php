<?php
/**
 * Created by PhpStorm.
 * User: monda
 * Date: 8/5/2020
 * Time: 11:16 AM
 */


//including the session class
$filepath = realpath(dirname(__FILE__));

include "../inc/db.php";


if(isset($_POST["import"])){

    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0)
    {

        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //echo '<prev>';print_r($emapData);

            //It wiil insert a row to our subject table from our csv file`
            $sql = "INSERT INTO states (state_id,            state_name,             country_id,           status )
                              VALUES ('".$emapData[0]."','".$emapData[1]."','".$emapData[2]."','".$emapData[3]."') ";
            //we are using mysql_query function. it returns a resource on true else False on error
            $result = mysqli_query($con , $sql);
            if(! $result )
            {
                echo "<script type=\"text/javascript\">
                    alert(\"Invalid File:Please Upload CSV File.\");
                    window.location = \"1c8.php\"
                    </script>";

            }

        }
        fclose($file);
        //throws a message if data successfully imported to mysql database from excel file
        echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"1c8_regions.php\"
            </script>";

        //close of connection
        mysqli_close($con);



    }
}
?>