<?php  include("inc/header_1c8.php") ?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>

<script src="js/scripts.js"></script>

<script src="js/modal.js"></script>
<!-- End header -->
<link rel="stylesheet" href="css/main.css">
<!-- section -->
<div class="innerpage_banner">
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h2>Добавить Контрагент</h2>
                <div class="submit-button " style="float: right">
                    <a href="1c8.php"><button class="btn btn-common" id="submit" type="submit">< Back </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php
if(isset($_POST['add_contragent'])){
    $addContragent = $contragent_1c8->addContragent($_POST);
}
?>
<?php
if(isset($_POST['add_bank_account']) && isset($_GET['idrref'])){
    $IDRRef = $_GET['idrref'];
    $addBankAccount = $contragent_1c8->addBankAccount($_POST, $IDRRef);
}
?>
<?php
if(isset($_POST['add_bank']) && isset($_GET['idrref'])){
    $IDRRef = $_GET['idrref'];
    $addBank = $contragent_1c8->addBank($_POST,$IDRRef);
}
?>
<!-- section -->
<div id="contact" class="contact-box">
    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Contragent')" id="defaultOpen"> Добавит Контрагента</button>
            <?php
            if(isset($_GET['idrref'])){
                ?>
                <button class="tablinks" onclick="openCity(event, 'Account')" >Добавить Банковские Счета</button>
                <button class="tablinks" onclick="openCity(event, 'Contact')" >Контакты</button>
                <?php
            }else{
                ?>
                <button  class="tablinks" onclick="openCity(event, 'Account')" disabled>Добавить Банковские Счета</button>
                <button class="tablinks" onclick="openCity(event, 'Contact')" disabled>Контакты</button>
                <?php
            }
            ?>


        </div>

        <div id="Contragent" class="tabcontent ">

            <?php
            if(isset($addContragent)){
                echo $addContragent;
            }
            ?>
            <form method="post" action="">
                <div class="row">
                    <?php
                    if(!isset($_GET['idrref'])){
                        ?>
                        <div class="col-lg-7 col-sm-7 col-xs-12">
                            <div class="contact-block">

                                <div class="row">
                                    <div class="col-md-6">
                                        <p>IDRRef</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="name" name="idrref" placeholder="Вставь IDRRef" required data-error="Please ID Контрагента" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>TableCodeId из 1с8</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="name" name="code" placeholder="Вставь Table Id" required data-error="Please коде из 1c8" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Наименование</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="name" name="name" placeholder="Вставь Наименование" required data-error="Please enter Наименование" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Наименование Полное</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" placeholder=" ВставьНаименование Полное" id="naimnovanie_polnoe" class="form-control" name="naimnovanie_polnoe" data-error="Please enter Наименование Полное" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Комментарий</p>
                                        <div class="form-group">
                                            <textarea style="color: #fff" class="form-control" id="commentary" name="commentary" placeholder="Вставь Комментарий" rows="2" data-error="Write your Комментарий" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5 col-xs-12">
                            <div class="left-contact">
                                <div class="contact-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>ИНН</p>
                                            <div class="form-group">
                                                <input style="color: #fff" type="text" class="form-control" id="inn" name="inn" placeholder="Вставь ИНН" data-error="Please enter ИНН" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p>КПП</p>
                                            <div class="form-group">
                                                <input style="color: #fff" type="text" placeholder="Вставь КПП" id="kpp" class="form-control" name="kpp"  data-error="Please enter КПП" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Код По ОКПО</p>
                                            <div class="form-group">
                                                <input style="color: #fff" type="text" class="form-control" id="okpo" name="okpo" placeholder="Вставь Код По ОКПО"  data-error="Please enter Код По ОКПО" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Покупатель</p>
                                            <div class="form-group">
                                                <select style="color: white" class="form-control"  name="pokupatel">
                                                    <option  value="1">ДА</option>
                                                    <option  value="0">НЕТ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Поставщик</p>
                                            <div class="form-group">
                                                <select style="color: white" class="form-control"  name="postavshik">
                                                    <option  value="1">ДА</option>
                                                    <option  value="0">НЕТ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Резидент</p>
                                            <div class="form-group">
                                                <select style="color: white" class="form-control"  name="ne_yavlyaetsya_rezidentom">
                                                    <option  value="1">ДА</option>
                                                    <option  value="0">НЕТ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="submit-button text-center">
                                                <button name="add_contragent" class="btn btn-common" id="submit" type="submit">Добавить Контрагент</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }else{
                        $IDRRef = $_GET['idrref'];
                        $getContragentByIDRRef = $contragent_1c8->getContragentByIDRRef($IDRRef);
                        if($getContragentByIDRRef){
                            while($row = $getContragentByIDRRef->fetch_assoc()) {
                                ?>
                                <div class="col-lg-7 col-sm-7 col-xs-12">
                                    <div class="contact-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>IDRRef</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control" id="name" name="idrref" placeholder="Вставь IDRRef" required data-error="Please ID Контрагента" value="<?php echo $row['_IDRRef']  ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>TableCodeId из 1с8</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control" id="name" name="code" placeholder="Вставь Table Id" required data-error="Please коде из 1c8" value="<?php echo $row['_Code']  ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p>Наименование</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control" id="name" name="name" placeholder="Вставь Наименование" required data-error="Please enter Наименование"  value="<?php echo $row['_Description']  ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p>Наименование Полное</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" placeholder=" ВставьНаименование Полное" id="naimnovanie_polnoe" class="form-control" name="naimnovanie_polnoe" data-error="Please enter Наименование Полное" value="<?php echo $row['_Fld1529']  ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p>Комментарий</p>
                                                <div class="form-group">
                                                    <textarea style="color: #fff" class="form-control" id="commentary" name="commentary" placeholder="Вставь Комментарий" rows="2" data-error="Write your Комментарий" ><?php echo $row['_Fld1527']  ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-5 col-xs-12">
                                    <div class="left-contact">
                                        <div class="contact-block">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>ИНН</p>
                                                    <div class="form-group">
                                                        <input style="color: #fff" type="text" class="form-control" id="inn" name="inn" placeholder="Вставь ИНН" data-error="Please enter ИНН" value="<?php echo $row['_Fld1524']  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>КПП</p>
                                                    <div class="form-group">
                                                        <input style="color: #fff" type="text" placeholder="Вставь КПП" id="kpp" class="form-control" name="kpp"  data-error="Please enter КПП" value="<?php echo $row['_Fld1528']  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Код По ОКПО</p>
                                                    <div class="form-group">
                                                        <input style="color: #fff" type="text" class="form-control" id="okpo" name="okpo" placeholder="Вставь Код По ОКПО"  data-error="Please enter Код По ОКПО" value="<?php echo $row['_Fld1526']  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>Покупатель</p>
                                                    <div class="form-group">
                                                        <select style="color: white" class="form-control"  name="pokupatel">
                                                            <?php
                                                            if($row['_Fld1535'] == 1){
                                                                ?>
                                                                <option selected  value="1">ДА</option>
                                                                <option  value="0">НЕТ</option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option selected  value="0">НЕТ</option>
                                                                <option  value="1">ДА</option>

                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>Поставщик</p>
                                                    <div class="form-group">
                                                        <select style="color: white" class="form-control"  name="postavshik">
                                                            <?php
                                                            if($row['_Fld1536'] == 1){
                                                                ?>
                                                                <option selected  value="1">ДА</option>
                                                                <option  value="0">НЕТ</option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option selected  value="0">НЕТ</option>
                                                                <option  value="1">ДА</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>Резидент</p>
                                                    <div class="form-group">
                                                        <select style="color: white" class="form-control"  name="ne_yavlyaetsya_rezidentom">
                                                            <?php
                                                            if($row['_Fld1540'] == 1){
                                                                ?>
                                                                <option selected  value="1">ДА</option>
                                                                <option  value="0">НЕТ</option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option selected  value="0">НЕТ</option>
                                                                <option  value="1">ДА</option>

                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
        <div id="Account" class="tabcontent">
            <form method="post" action="">
                <div class="row">
                    <?php
                    if(isset($_GET['id_Account'])){
                        $account_id = $_GET['id_Account'];
                        $getAccountByIDRRef = $contragent_1c8->getAccountByIDRRef($account_id);
                        if($getAccountByIDRRef) {
                            while ($rows = $getAccountByIDRRef->fetch_assoc()) {
                                ?>
                                <div class="col-md-12">
                                    <p>Банк</p> <br><br><br>
                                    <div class="form-group">
                                        <div class="wrap">
                                            <div class="search">
                                                <select class=" searchTerm form-control" name="bank_id">
                                                    <?php
                                                    $getAllBankAccounts = $contragent_1c8->getAllBankAccounts();
                                                    if ($getAllBankAccounts) {
                                                        while ($row = $getAllBankAccounts->fetch_assoc()) {
                                                            ?>
                                                            <option
                                                                <?php
                                                                if ($row['_IDRRef'] == $rows['_Fld1152RRef']) {
                                                                    ?> selected="selected"
                                                                    <?php
                                                                }
                                                                ?>
                                                                value="<?php echo $row['_IDRRef'] ?>"><?php echo $row['_Description'] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <button type="submit" class="searchButton " id="myBtn">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-7 col-xs-12">
                                    <div class="contact-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>IDRRef</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control"
                                                           id="idrref" name="idrref" placeholder="Вставь IDRRef"
                                                           required data-error="Please ID Банка"
                                                           value="<?php echo $rows['_IDRRef'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Код из 1с8</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control"
                                                           id="code" name="code" placeholder="Вставь Код из 1с8"
                                                           required data-error="Please code Из 1с8"
                                                           value="<?php echo $rows['_Code'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p>Наименование счета</p>
                                                <div class="form-group">
                                                    <input style="color: #fff" type="text" class="form-control"
                                                           id="name" name="bank_account_name"
                                                           placeholder="Вставь Наименование счета" required
                                                           data-error="Please enter Наименование счета"
                                                           value="<?php echo $rows['_Description'] ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-5 col-xs-12">
                                    <div class="left-contact">
                                        <div class="contact-block">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Счет банка</p>
                                                    <div class="form-group">

                                                        <input style="color: #fff" type="text" class="form-control"
                                                               id="bank_account_number" name="bank_account_number"
                                                               placeholder="Вставь Счет банка" required
                                                               data-error="Please enter Счет банка"
                                                               value="<?php echo $rows['_Fld1151'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p>Корреспондент</p>
                                                    <div class="form-group">

                                                        <input style="color: #fff" type="text" class="form-control"
                                                               id="bank_account_corres" name="bank_account_corres"
                                                               placeholder="Вставь Корреспондент" required
                                                               data-error="Please enter Корреспондент"
                                                               value="<?php echo $rows['_Fld1154'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }else{
                        ?>
                        <div class="col-md-12">
                            <p>Банк</p> <br><br><br>

                            <div class="form-group">
                                <div class="wrap">
                                    <div class="search">
                                        <select class=" searchTerm form-control"  name="bank_id">
                                            <?php
                                            $getAllBankAccounts = $contragent_1c8->getAllBankAccounts();
                                            if($getAllBankAccounts){
                                                while($row = $getAllBankAccounts->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $row['_IDRRef'] ?>"><?php echo $row['_Description'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" class="searchButton " id="myBtn">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-12">
                            <div class="contact-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>IDRRef</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="idrref" name="idrref" placeholder="Вставь IDRRef" required data-error="Please ID Банка" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Код из 1с8</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="code" name="code" placeholder="Вставь Код из 1с8" required data-error="Please code Из 1с8" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Наименование счета</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="name" name="bank_account_name" placeholder="Вставь Наименование счета" required data-error="Please enter Наименование счета" >
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-5 col-xs-12">
                            <div class="left-contact">
                                <div class="contact-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Счет банка</p>
                                            <div class="form-group">
                                                <input style="color: #fff" type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="Вставь Счет банка" required data-error="Please enter Счет банка" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Корреспондент</p>
                                            <div class="form-group">
                                                <input style="color: #fff" type="text" class="form-control" id="bank_account_corres" name="bank_account_corres" placeholder="Вставь Корреспондент" required data-error="Please enter Корреспондент" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <div class="submit-button text-center">
                                                <button name="add_bank_account" class="btn btn-common" id="submit" type="submit">Добавить Счёт</button>
                                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </form>
        </div>
        <div id="Contact" class="tabcontent">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-block"><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Тип адреса</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="address_type" name="address_type">

                                            <?php
                                            $getAllAddressTypes = $contragent_1c8->getAllAddressTypes();
                                            if($getAllAddressTypes){
                                                while($row = $getAllAddressTypes->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php  echo $row['id'] ?>"><?php  echo $row['type'] ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Наименование страны</p>
                                    <div class="form-group">
                                        <?php
                                        include("inc/db.php");
                                        $sql = "SELECT * FROM countries ORDER BY country_name ASC";
                                        $run = mysqli_query($con, $sql);
                                        $count = mysqli_num_rows($run);
                                        ?>
                                        <select style="color: #fff"  class="form-control" id="country" name="country">
                                            <option  value="" style="color: #fff"  class="form-control">Выберите страну</option>
                                            <?php
                                            if($count > 0){
                                                while($row = mysqli_fetch_array($run)) {
                                                    echo '<option style="color: #fff" value="'.$row['country_id'].'" class="form-control">'.$row['country_name'].' </option>';
                                                }
                                            }else{
                                                echo ' <option value=""> Нет в наличии</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Называние региона</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="state" name="state">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Город</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="city" name="city">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Район</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="area" name="area">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Почтовый адрес</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="index" name="index">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Основной адрес</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="checkbox" class="form-control" id="main_address" name="main_address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Поселок</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="village" name="village">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="left-contact">
                            <div class="contact-block"><br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Улица</p>
                                        <div class="form-group">
                                            <select style="color: #fff"  class="form-control" id="street" name="street">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Дом</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="house" name="house"  >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>корпус</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="corpus" name="corpus"  >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Квартира</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="flat" name="flat"  >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Телефон</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="telephone" name="telephone" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Дата Регистрации</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="date" class="form-control" id="register_date" name="register_date" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Дата окончания регистрации</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="date" class="form-control" id="expire_date" name="expire_date" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Примечание</p>
                                        <div class="form-group">
                                            <textarea rows="2" style="color: #fff" type="text" class="form-control" id="note" name="note" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit-button text-center">
                                            <button name="add_contact" class="btn btn-common" id="submit" type="submit">Добавить Контакт Контрагента </button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="js/tabs.js"></script>
    </div>
</div>
<!-- end section -->
<!-- Start Footer -->
<?php  include("inc/footer.php")  ?>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2 style="text-align: center;color: #fff;padding: 5px;">Добавить Банк</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-7 col-sm-7 col-xs-12">
                        <div class="contact-block"><br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>IDRRef</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="idrref" name="idrref" placeholder="Вставь IDRRef" data-error="Please ID Банка" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>БИК</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="bik" name="bik" placeholder="Вставь Код из 1с8" data-error="Please бик" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Наимнование Банка</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="name" name="bank_name" placeholder="Вставь Наименование счёта" required data-error="Please enter Наименование" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Город</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="city" name="city" placeholder="Вставь Город Банка"  data-error="Please enter Город Банка" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Телефон</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="telephone" name="telephone" placeholder="Вставь Телефон" data-error="Please ВСТАВТЕ ТЕЛЕФОН" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-xs-12">
                        <div class="left-contact">
                            <div class="contact-block"><br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Корреспондент</p>
                                        <div class="form-group">
                                            <input style="color: #fff" type="text" class="form-control" id="correspondent" name="correspondent" placeholder="Вставь Корреспондент Банка"  data-error="Please enter Корреспондент" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Адрес</p>
                                        <div class="form-group">
                                            <textarea row="2" style="color: #fff" type="text" class="form-control" id="address" name="bank_address" placeholder="Вставь Адрес"  data-error="Please ВСТАВТЕ Адрес" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit-button text-center">
                                            <button name="add_bank" class="btn btn-common" id="submit" type="submit">Добавить Счёт Банка </button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>

