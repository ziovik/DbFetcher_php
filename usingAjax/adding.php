<?php
include ("inc/db.php");

//Include database configuration file
echo "<script>alert('hello')</script>";
print_r($_POST);
if(isset($_POST['add_contragent']) && !empty($_POST['add_contragent'])){

    $code = $_POST['code'];
    $idrref = $_POST['idrref'];
    $name = $_POST['name'];
    $naimnovanie_polnoe = $_POST['naimnovanie_polnoe'];
    $inn = $_POST['inn'];
    $commentary = $_POST['commentary'];
    $kpp = $_POST['kpp'];
    $pokupatel = $_POST['pokupatel'];
    $postavshik = $_POST['postavshik'];
    $ne_yavlyaetsya_rezidentom = $_POST['ne_yavlyaetsya_rezidentom'];
    $okpo = $_POST['okpo'];

    if($name == "" || $naimnovanie_polnoe == ""){
        return $message = "<span>Наименование или Наименование Полное пустое</span>";
    }else{
        $sql =$con->query("SELECT * FROM _reference85 WHERE  _Fld1524 ='$inn' AND _Fld1528 = '$kpp'");
        $rowCount = $sql->num_rows;
        if($rowCount > 0){
            return $message = "<span>Это Наименование или Наименование уже есть</span>";
        }else{
            $query = $con->query("INSERT INTO _reference85 ( _IDRRef, _Code,  _Description ,  _Fld1529,  _Fld1524 , _Fld1528 ,_Fld1527,_Fld1526,_Fld1535  , _Fld1536 , _Fld1540) VALUES
                                                   ('$idrref','$code',  '$name',   '$naimnovanie_polnoe','$inn',   '$kpp','$commentary','$okpo','$pokupatel','$postavshik','$ne_yavlyaetsya_rezidentom')
                        ");

            if($query){
                echo "<p style='color: green;font-size: 16px;'>Successfully Added</p>";
            }else{
                echo "<p style='color: red;font-size: 16px;'>Problem Adding</p>";
            }

        }

    }

}
