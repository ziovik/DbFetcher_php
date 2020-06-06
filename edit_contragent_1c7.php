<?php  include("inc/header_1c7.php") ?>
<!-- End header -->

<!-- section -->
<div class="innerpage_banner">
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <h2>Edit Contragents</h2>
                <div class="submit-button " style="float: right">
                    <a href="1c7.php"><button class="btn btn-common" id="submit" type="submit">< Back </button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php
if(isset($_GET['contragent_id'])){
    $contragent_id = $_GET['contragent_id'];
    $getContragentById = $contragent_1c7->getContragentById($contragent_id);
    if($getContragentById){
        $row = $getContragentById->fetch_assoc();
        $naimnovanie_polnoe = $row['naimnovanie_polnoe'];
        $value1 = "ДА";
        $value2 = "НЕТ";
    }
}

?>
<?php
if(isset($_POST['update_contragent']) && isset($_GET['contragent_id'])){
    $contragent_id = $_GET['contragent_id'];

    $updateContragentById = $contragent_1c7->updateContragentById($contragent_id, $_POST);
}
?>
<!-- section -->
<div id="contact" class="contact-box">
    <div class="container">
        <?php
        if(isset($updateContragentById)){
            echo $updateContragentById;

        }
        ?>
        <form method="post" action="">
            <div class="row">

                <div class="col-lg-7 col-sm-7 col-xs-12">
                    <div class="contact-block">

                        <div class="row">
                            <div class="col-md-12">
                                <p>Наименование</p>
                                <div class="form-group">

                                    <input style="color: #fff" type="text" class="form-control" id="name" name="name" placeholder="Вставь Наименование" required data-error="Please enter Наименование" value="<?php echo $row['name'] ?>">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <p>Наименование Полное</p>
                                <div class="form-group">
                                    <input style="color: #fff" type="text" placeholder=" ВставьНаименование Полное" id="naimnovanie_polnoe" class="form-control" name="naimnovanie_polnoe" data-error="Please enter Наименование Полное" value="<?php    $r = str_ireplace('"','',"$naimnovanie_polnoe"); echo $r; ?>">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <p>ЮрФиз Лицо</p>
                                <div class="form-group">
                                    <input style="color: #fff" type="text" class="form-control" id="ur_fiz_litso" name="ur_fiz_litso" placeholder="Вставь ЮрФиз Лицо"  data-error="Please enter ЮрФиз Лицо" value="<?php echo $row['ur_fiz_litso'] ?>">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>Комментарий</p>
                                <div class="form-group">
                                    <textarea style="color: #fff" class="form-control" id="commentary" name="commentary" placeholder="Вставь Комментарий" rows="2" data-error="Write your Комментарий" ><?php echo $row['commentary'] ?></textarea>

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
                                        <input style="color: #fff" type="text" class="form-control" id="inn" name="inn" placeholder="Вставь ИНН" data-error="Please enter ИНН" value="<?php echo $row['inn'] ?>">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>КПП</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь КПП" id="kpp" class="form-control" name="kpp"  data-error="Please enter КПП" value="<?php echo $row['kpp'] ?>">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Телефон</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" class="form-control" id="telephone" name="telephone" placeholder="Вставь telephone"  data-error="Please enter telephone" value="<?php echo $row['telephone'] ?>">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p>Основной Банковский Счет</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Основной Банковский Счет" id="osnovnoi_bank_shot" class="form-control" name="osnovnoi_bank_shot"  data-error="Please enter Основной Банковский Счет" value="<?php echo $row['osnovnoi_bank_shot'] ?>">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p>Почтовой Адрес</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Почтовой Адрес" id="pochtavoi_address" class="form-control" name="pochtavoi_address"  data-error="Please enter Почтовой Адрес" value="<?php echo $row['pochtavoi_address'] ?>">

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <p>Основной Договор Контрагента</p>
                                    <div class="form-group">
                                        <input style="color: #fff" type="text" placeholder="Вставь Основной Договор Контрагента" id="osnovnoi_dogovor_contragent" class="form-control" name="osnovnoi_dogovor_contragent"  data-error="Please enter Основной Договор Контрагента" value="<?php echo $row['osnovnoi_dogovor_contragent'] ?>">

                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="submit-button text-center">
                                        <button name="update_contragent" class="btn btn-common" id="submit" type="submit">Update Contragent</button>
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
</div>
<!-- end section -->

<!-- Start Footer -->
<?php  include("inc/footer.php")  ?>

<?php //if($row['pokupatel'] == '1'){echo 'ДА';}else{echo 'НЕТ';} ?>
