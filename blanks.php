<?php  include("inc/header_1c8.php") ?>
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
                    if(isset($_GET['idrref'])){
                        $IDRRef = $_GET['idrref'];
                        $getContragentByIDRRef = $contragent_1c8->getContragentByIDRRef($IDRRef);
                        if($getContragentByIDRRef){
                            while($row = $getContragentByIDRRef->fetch_assoc()){
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
                        }else{
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
                    <div class="col-lg-7 col-sm-7 col-xs-12">
                        <div class="contact-block"><br><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <p>Город</p>
                                    <div class="form-group">

                                        <input style="color: #fff" type="text" class="form-control" id="idrref" name="city" placeholder="Вставь город" required data-error="Please город" >

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Телефон</p>
                                    <div class="form-group">

                                        <input style="color: #fff" type="text" class="form-control" id="idrref" name="telephone" placeholder="Вставь телефон" data-error="Please телефон" >

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
                                        <p>Адрес</p>
                                        <div class="form-group">

                                            <textarea rows="2" style="color: #fff" type="text" class="form-control" id="address" name="address" placeholder="Вставь Корреспондент"  data-error="Please ВСТАВТЕ Адрес" ></textarea>

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
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>

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
        <div class="modal-footer">

        </div>
    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type: 'POST',
                    url: 'ajaxData.php',
                    data: 'country_id ='+countryID,
                    success: function (html) {
                        $('#region').html(html);
                        $('#state').html('<option value="">Select Region First</option>');
                    }
                });
            }else{
                $('#region').html('<option value="">Select Country First</option>');
                $('#state').html('<option value="">Select Region First</option>');
            }

        });
        $('#region').on('change', function () {
            var regionID = $(this).val();
            if(regionID){
                $.ajax({
                    type: 'POST',
                    url: 'ajaxData.php',
                    data: 'region_id ='+regionID,
                    success: function (html) {
                        $('#region').html(html);
                    }
                });
            }else{
                $('#state').html('<option value="">Select State First</option>');
            }

        })
    })
</script>

<?php
include "lib/session.php";
Session::init();
include "helper/format.php";
include "lib/database_1c8.php";
// autoload classes
spl_autoload_register(function ($class){
    include_once "classes/".$class.".php   ";
});


$db      = new Database_1c8();
$fm      = new Format();
$contragent_1c8 = new Db_1C8();


if(isset($_POST['country_id']) && !empty($_POST['country_id'])){
    $country_id = $_POST['country_id'];
    $getAllRegions = $contragent_1c8->getAllRegions($country_id);
    if($getAllRegions){
        while ($row = $getAllRegions->fetch_assoc()){
            echo '<option value="'.$row['region_id'].'" style="color: #fff" class="form-control"> "'.$row['region_name'].'"</option>';
        }
    }else{
        echo '<option value="" style="color: #fff" class="form-control"> Region Not Available</option>';
    }

}

if(isset($_POST['region_id']) && !empty($_POST['region_id'])){
    $region_id = $_POST['region_id'];
    $getAllStates = $contragent_1c8->getAllStates($region_id);
    if($getAllStates){
        while ($row = $getAllStates->fetch_assoc()){
            echo '<option value="'.$row['state_id'].'" style="color: #fff" class="form-control"> "'.$row['state_name'].'"</option>';
        }
    }else{
        echo '<option value="" style="color: #fff" class="form-control"> Region Not Available</option>';
    }

}
