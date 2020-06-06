<?php include("inc/header_1c8.php") ?>
<!-- End header -->
<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php
if(!isset($_GET['id'])){
    echo "<meta  http-equiv='refresh' content='0;URL=?id=live'  />";
}
?>
<?php
if(isset($_GET['delete_id'])){
    $contragent_id = $_GET['delete_id'];
    $deleteContragentById = $contragent_1c8->deleteContragetById($contragent_id);
}
?>
<!-- section -->
<div class="section layout_padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="contact-block">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="submit-button">
                                    <a href="index.php" >
                                        <button  class="btn btn-common" id="submit" type="submit"><  Back  </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="full center margin-bottom_30">
                    <div class="heading_main text_align_center">
                        <h2><span class="theme_color">Контрагенты </span> в 1C8 </h2>
                        <p class="large">Database</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div id="checkbox_div">

                    <li><input type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);"> Наименование</li>
                    <li><input type="checkbox" value="hide" id="inn_col" onchange="hide_show_table(this.id);"> ИНН</li>
                    <li><input type="checkbox" value="hide" id="kpp_col" onchange="hide_show_table(this.id);"> КПП</li>
                    <li><input type="checkbox" value="hide" id="commentary_col" onchange="hide_show_table(this.id);"> Комментарий</li>
                    <li><input type="checkbox" value="hide" id="naimnovanie_polnoe_col" onchange="hide_show_table(this.id);"> Наименование Полное</li>
                    <li><input type="checkbox" value="hide" id="osnovnoi_dogovor_contragent_col" onchange="hide_show_table(this.id);"> Основной Договор Контрагента</li>
                    <li><input type="checkbox" value="hide" id="postavshik_col" onchange="hide_show_table(this.id);"> Поставщик</li>
                    <li><input type="checkbox" value="hide" id="ne_rezident_col" onchange="hide_show_table(this.id);"> Не Является Резидентом</li>
                </div>

                <table id="employee_table" align="center" cellpadding=10>
                    <?php
                    $getAllContragents = $contragent_1c8->getAllContragents();
                    $i=0;
                    if(empty($getAllContragents)){
                        echo "<h2>empty database</h2>";
                    }else{
                        echo '
                               <tr>
                                  <th>S.no</th>
                                  <th id="name_col_head">Наименование</th>
                                  <th id="inn_col_head">ИНН</th>
                                  <th id="kpp_col_head">КПП</th>
                                  <th id="commentary_col_head">Комментарий</th>
                                  <th id="naimnovanie_polnoe_col_head">Наименование Полное</th>
                                  <th id="osnovnoi_dogovor_contragent_col_head">Основной Договор Контрагента</th>
                                  <th id="pastavshik_col_head">Поставщик</th>
                                  <th id="ne_reszident_col_head">Не Является Резидентом</th>
                                   <th >Action</th>
                              </tr>
                          ';
                        while($row = $getAllContragents->fetch_assoc()){
                            $i++;
                            $postavshik = $row['postavshik'];
                            $ne_rezident = $row['ne_yavlyaetsya_rezidentom'];


                            ?>
                            <tr>
                                <td><?php echo $i  ?></td>
                                <td class="name_col"><?php echo $row['name']  ?></td>
                                <td class="inn_col"><?php echo $row['inn']  ?></td>
                                <td class="kpp_col"><?php echo $row['kpp']  ?></td>
                                <td class="commentary_col"><?php echo $row['commentary']  ?></td>
                                <td class="naimnovanie_polnoe_col"><?php echo $row['naimnovanie_polnoe']  ?></td>
                                <td class="osnovnoi_dogovor_contragent_col"><?php echo $row['osnovnoi_dogovor_contragent']  ?></td>
                                <td class="pastavshik_col">
                                    <?php
                                    if($postavshik == '1'){
                                        echo '<input checked type="checkbox" onclick="return false;">';
                                    }else{
                                        echo '<input  type="checkbox" onclick="return false;">';
                                    }
                                    ?>
                                </td>
                                <td class="ne_rezident_col">
                                    <?php
                                    if($ne_rezident == '1'){
                                        echo '<input checked type="checkbox" onclick="return false;">';
                                    }else{
                                        echo '<input  type="checkbox" onclick="return false;">';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="edit_contragent_1c8.php?contragent_id=<?php echo $row['id'] ?>">Edit  </a>|| <a href="?delete_id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contragent?')"> Delete </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>




                </table>
            </div>
        </div>

    </div>
</div>
<!-- end section -->


<!-- Start Footer -->
<?php include("inc/footer.php") ?>

<script type="text/javascript">
    function hide_show_table(col_name)
    {
        var checkbox_val=document.getElementById(col_name).value;
        if(checkbox_val=="hide")
        {
            var all_col=document.getElementsByClassName(col_name);
            for(var i=0;i<all_col.length;i++)
            {
                all_col[i].style.display="none";
            }
            document.getElementById(col_name+"_head").style.display="none";
            document.getElementById(col_name).value="show";
        }

        else
        {
            var all_col=document.getElementsByClassName(col_name);
            for(var i=0;i<all_col.length;i++)
            {
                all_col[i].style.display="table-cell";
            }
            document.getElementById(col_name+"_head").style.display="table-cell";
            document.getElementById(col_name).value="hide";
        }
    }


</script>
<?php

$sql = "SELECT * FROM _reference14";
$run = $this->db->update($sql);
$row = $run->fetch_assoc();
$ref13_connection_id = $row['_Fld1152RRef'];




?>