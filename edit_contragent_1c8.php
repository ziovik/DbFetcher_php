<?php  include("inc/header_1c8.php") ?>
<!-- End header -->
<link rel="stylesheet" href="css/main.css">
<!-- section -->
<div class="innerpage_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center">Обновить Контрагент</h2>
                <div class="submit-button " style="float: right">
                    <a href="1c8.php"><button class="btn btn-common" id="submit" type="submit">< Назад </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php
if(isset($_GET['contragent_id'])){
    $contragent_id = $_GET['contragent_id'];
    $getContragentById = $contragent_1c8->getContragentById($contragent_id);
    if($getContragentById){
        $row = $getContragentById->fetch_assoc();
         $naimnovanie_polnoe = $row['_Fld1529'];
         $value1 = "ДА";
         $value2 = "НЕТ";
    }
}
?>
<?php
  if(isset($_POST['update_contragent']) && isset($_GET['contragent_id'])){
      $contragent_id = $_GET['contragent_id'];

      $updateContragentById = $contragent_1c8->updateContragentById($contragent_id, $_POST);
  }
?>
<?php
if(isset($_POST['update_bankAccount']) && isset($_GET['contragent_id'])){
    $contragent_id = $_GET['contragent_id'];
    $bank_name = $_POST['bank_name'];

    $updateBankAccountContragentById = $contragent_1c8->updateBankAccountContragentById($contragent_id, $_POST);
}
?>
<!-- section -->
<div id="contact" class="contact-box">
    <div class="container">
        <?php
        if(isset($updateContragentById)){
            echo $updateContragentById;
        }
        if(isset($updateBankAccountContragentById)){
            echo $updateBankAccountContragentById;
        }
        ?>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'contragent')" id="defaultOpen">Контрагент</button>
            <button class="tablinks" onclick="openCity(event, 'account')">Банковский счёт</button>
            <button class="tablinks" onclick="openCity(event, 'contacts')">Контакты</button>
        </div>
        <div id="contragent" class="tabcontent">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-7 col-sm-7 col-xs-12">
                        <div class="contact-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Наименование</p>
                                    <div class="form-group">
                                        <input  type="hidden" class="form-control"  name="connection_id"   value="<?php echo $row['_Fld1531RRef'] ?>">
                                        <input style="color: #fff" type="text" class="form-control" id="name" name="name" placeholder="Вставь Наименование" required data-error="Please enter Наименование" value="<?php echo $row['_Description'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>ИНН</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="inn" name="inn" placeholder="Вставь ИНН" data-error="Please enter ИНН" value="<?php echo $row['_Fld1524'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>КПП</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь КПП" id="kpp" class="form-control" name="kpp"  data-error="Please enter КПП" value="<?php echo $row['_Fld1528'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Код По ОКПО</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="code_po_okpo" name="okpo" placeholder="Вставь Код По ОКПО"  data-error="Please enter Код По ОКПО" value="<?php echo $row['_Fld1526'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Покупатель</p>
                                    <div class="form-group">
                                        <select style="color: #fff" class="form-control" name="pokupatel">
                                            <?php
                                            if($row['_Fld1535'] == 0){ ?>
                                                <option selected="selected" value="0">НЕТ</option>
                                                <option value="1">ДА</option>
                                            <?php } else{?>
                                                <option selected="selected"  value="1">ДА</option>
                                                <option value="0">НЕТ</option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Поставщик</p>
                                    <div class="form-group">
                                        <select style="color: #fff" class="form-control" name="postavshik">
                                            <?php
                                            if($row['_Fld1536'] == 0){ ?>
                                                <option selected="selected" value="0">НЕТ</option>
                                                <option value="1">ДА</option>
                                            <?php } else{?>
                                                <option selected="selected"  value="1">ДА</option>
                                                <option value="0">НЕТ</option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p>Резидент</p>
                                    <div class="form-group">
                                        <select style="color: #fff" class="form-control" name="ne_yavlyaetsya_rezidentom" >
                                            <?php
                                            if($row['_Fld1540'] == 0){ ?>
                                                <option selected="selected" value="0">НЕТ</option>
                                                <option value="1">ДА</option>
                                            <?php } else{?>
                                                <option selected="selected"  value="1">ДА</option>
                                                <option value="0">НЕТ</option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-xs-12">
                        <div class="left-contact">
                            <div class="contact-block">
                                <div class="col-md-12">
                                    <p>Наименование Полное</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder=" ВставьНаименование Полное" id="naimnovanie_polnoe" class="form-control" name="naimnovanie_polnoe" data-error="Please enter Наименование Полное" value="<?php    $r = str_ireplace('"','',"$naimnovanie_polnoe"); echo $r; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Комментарий</p>
                                    <div class="form-group">
                                        <textarea style="color: #fff" class="form-control" id="commentary" name="commentary" placeholder="Вставь Комментарий" rows="2" data-error="Write your Комментарий" ><?php echo $row['_Fld1527'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button name="update_contragent" class="btn btn-common" id="submit" type="submit">Обновить Контрагент</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="account" class="tabcontent">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-7 col-sm-7 col-xs-12">
                        <div class="contact-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Bank Description</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Bank Description" id="istochnik_info" class="form-control" name="bank_account_name"  data-error="Please enter Bank Description" value="<?php echo $row['bank_account_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Основной Банковский Счет</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Основной Банковский Счет" id="osnovnoi_bank_shot" class="form-control" name="bank_account_number"  data-error="Please enter Основной Банковский Счет" value="<?php echo $row['bank_account_number'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p>Называние Банка</p><br><br><br>
                                    <div class="form-group">
                                        <div class="wrap">
                                            <div class="search">
                                                <?php
                                                include("inc/db.php");
                                                $sql = "SELECT * FROM _Reference13 ORDER BY _Description ASC";
                                                $run = mysqli_query($con, $sql);
                                                $count = mysqli_num_rows($run);
                                                ?>
                                                <select style="color: #fff" class="form-control" name="bank_name" >
                                                    <?php
                                                    if($count > 0){
                                                        while($rows = mysqli_fetch_array($run)) {
                                                            ?>
                                                            <option
                                                                <?php
                                                                if($row['bank_name'] == $rows['_Description']){
                                                                    ?>
                                                                    selected ="selected"
                                                                    <?php
                                                                }
                                                                ?>
                                                                    style="color: #fff" value="<?php echo $rows['id'] ?>" class="form-control"><?php echo $rows['_Description']  ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }else{
                                                        echo ' <option value=""> Нет в наличии</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <button onclick="onBankClick()"    type="button" class=" searchButton  btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-xs-12">
                        <div class="left-contact">
                            <div class="contact-block">
                                <div class="col-md-12">
                                    <p>Банк Корреспондент</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Банк Корреспондент" id="Банк Корреспондент" class="form-control" name="bank_corres"  data-error="Please enter Банк Корреспондент" value="<?php echo $row['bank_corres'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button name="update_bankAccount" class="btn btn-common" id="submit" type="submit">Обновить банковский счет</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="contacts" class="tabcontent">
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Наименование страны</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class=" taken form-control" id="country" name="country" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Называние региона</p>
                                    <div class="form-group">
                                        <div class="search1">
                                            <span class="fa fa-search"></span>
                                            <input style="color: #000;background: #fff;border: 1px solid #0892fd;" type="text" class="form-control" id="search_state" name="search_state" >
                                        </div>
                                        <select style="color: #fff"  class=" taken form-control" id="state" name="state" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Нас. пукт</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="village" name="village">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Почтовый адрес</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="index" name="index" >
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

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="left-contact">
                            <div class="contact-block">
                                <div class="col-md-12">
                                    <p>Город</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class=" taken form-control" id="city" name="city" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Район</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="area" name="area" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Улица</p>
                                    <div class="form-group">
                                        <select style="color: #fff"  class="form-control" id="street" name="street">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Телефон</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="telephone" name="telephone" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Примечание</p>
                                    <div class="form-group">
                                        <textarea rows="2" style="color: #fff" type="text" class="form-control" id="note" name="note" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button name="update_contact" class="btn btn-common" id="submit" type="submit">Обновить Контакт</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>


    </div>
</div>
<!-- end section -->

<!-- Start Footer -->
<?php  include("inc/footer.php")  ?>
<script src="js/tabs.js"></script>
<script>

    function loadBankData(bank) {
        $('#bank_name').text(bank._Description); /*name - is the field in bank class*/
        $('#bik').text(bank._Code); /*bik is the same*/
        $('#correspondent_bank').text(bank._Fld1146);
        $('#bank_city').text(bank._Fld1147);
        $('#bank_address').text(bank._Fld1148);
        $('#bank_telephone').text(bank._Fld1149);

    }
    function onBankClick() {
        var bankName = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'modal_bank.php?bank_name=' + bankName,
            success: function (data) {
                loadBankData(JSON.parse(data))
            },
            error: function () {
                console.log('ERROR')
            }
        });
    }
</script>
<!-- The Modal  Добавить Банк-->
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Банк</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="contact-block">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Называние Банка</p>
                                <div class="form-group">
                                    <input readonly style="color: #fff" type="text"  id="bank_name" class="form-control" name="bank_name"  value="<?php    $r = str_ireplace('"','',"".$row['bank_name'].""); echo $r; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Банк Корреспондента</p>
                                <div class="form-group">
                                    <input readonly style="color: #fff" type="text" placeholder="Вставь Банк Корреспондента" id="correspondent_bank" class="form-control" name="correspondent_bank" value="<?php echo $row['corres_bank'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>БИК</p>
                                <div class="form-group">
                                    <input readonly style="color: #fff" type="text" placeholder="Вставь БИК" id="bik" class="form-control" name="bik"   value="<?php echo $row['bik'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Адрес</p>
                                <div class="form-group">
                                    <input readonly style="color: #fff" type="text" placeholder="Вставь Адрес Банка" id="bank_address" class="form-control" name="bank_address"  value="<?php echo $row['bank_address'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Город</p>
                                <div class="form-group">
                                    <input readonly style="color: #fff" type="text" placeholder="Вставь Город Банка" id="bank_city" class="form-control" name="bank_city"  value="<?php echo $row['bank_city'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Телефон</p>
                                <div class="form-group">
                                    <input  readonly style="color: #fff" type="text" placeholder="Вставь Телефон Банка" id="bank_telephone" class="form-control" name="bank_telephone"  value="<?php echo $row['bank_telephone'] ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
