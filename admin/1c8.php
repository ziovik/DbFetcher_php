<?php include("inc/header.php")  ?>
<!-- End header -->


<!-- section -->
<div class="section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="full center margin-bottom_30">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color">DbFetcher</span> of Contragents</h2>
                        <p class="large">Insert into Db</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="contact" class="contact-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadRegions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="import" class="btn btn-common" id="submit" type="submit">Загружать Регионов CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Регионов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadCity.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="importCity" class="btn btn-common" id="submit" type="submit">Загружать Городов CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Домов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadArea.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="importArea" class="btn btn-common" id="submit" type="submit">Загружать Районов CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Домов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadDom.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="import" class="btn btn-common" id="submit" type="submit">Загружать Домов CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Домов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadStreet.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="importCity" class="btn btn-common" id="submit" type="submit">Загружать Улиц CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Домов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                <div class="contact-block">
                                    <div class="full center">
                                        <form  action="uploadIndex.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" placeholder="load file" id="number" class="form-control" name="file" required data-error="load file">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="submit-button text-center">
                                                        <button name="importArea" class="btn btn-common" id="submit" type="submit">Загружать Почтовых индексов CSV Файл   ></button>
                                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                    </div>
                                    <div class="full center">
                                        <div class="submit-button ">
                                            <a style="background: red" href="?delete" onclick=" return confirm('Do want to clear the Табл Домов?')">
                                                <button style="background: red"   class="btn btn-common" id="submit" type="submit">Очистить Табл.  ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end section -->


<!-- Start Footer -->
<?php include ("../inc/footer.php")?>

