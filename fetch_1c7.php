<?php
include "lib/database_1c7.php";
spl_autoload_register(function ($class){
    include_once "classes/".$class.".php   ";
});

$contragent_1c7 = new Db_1C7();
?>
<div id="checkbox_div">

    <li><input type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);"> Наименование</li>
    <li><input type="checkbox" value="hide" id="naimnovanie_polnoe_col" onchange="hide_show_table(this.id);"> Наименование Полное</li>
    <li><input type="checkbox" value="hide" id="u_col" onchange="hide_show_table(this.id);"> Юридическое Лицо</li>
    <li><input type="checkbox" value="hide" id="ad_col" onchange="hide_show_table(this.id);"> Почтовой Адрес</li>
    <li><input type="checkbox" value="hide" id="t_col" onchange="hide_show_table(this.id);"> Телефон</li>
    <li><input type="checkbox" value="hide" id="inn_col" onchange="hide_show_table(this.id);"> ИНН</li>
    <li><input type="checkbox" value="hide" id="kpp_col" onchange="hide_show_table(this.id);"> КПП</li>
<!--    <li><input type="checkbox" value="hide" id="commentary_col" onchange="hide_show_table(this.id);"> Комментарий</li>-->
<!---->
<!--    <li><input type="checkbox" value="hide" id="osnovnoi_dogovor_contragent_col" onchange="hide_show_table(this.id);"> Основной Договор Контрагента</li>-->


</div>

<table id="employee_table" align="center" cellpadding=10>
    <tr>
        <th>S.no</th>
        <th id="name_col_head">Наименование</th>
        <th id="naimnovanie_polnoe_col_head">Наименование Полное</th>
        <th id="u_col_head"> Юридическое Лицо</th>
        <th id="ad_col_head"> Почтовой Адрес</th>
        <th id="t_col_head">Телефон</th>
        <th id="inn_col_head">ИНН</th>
        <th id="kpp_col_head">КПП</th>
<!--        <th id="commentary_col_head">Комментарий</th>-->
<!--        <th id="osnovnoi_dogovor_contragent_col_head">Основной Договор Контрагента</th>-->
        <th style="width: 150px">Action</th>
    </tr>
    <?php
    if (isset($_POST["query"]))
    {
        $search = $_POST["query"];
        $i=0;
        $searchContragent = $contragent_1c7->searchContragent($search);
        if($searchContragent){
            while($row = $searchContragent->fetch_assoc()){
                $i++;

                ?>
                <tr>
                    <td><?php echo $i  ?></td>
                    <td class="name_col"><?php echo $row['name']  ?></td>
                    <td class="naimnovanie_polnoe_col"><?php echo $row['naimnovanie_polnoe']  ?></td>
                    <td class="u_col"><?php echo $row['ur_fiz_litso']  ?></td>
                    <td class="ad_col"><?php echo $row['pochtavoi_address']  ?></td>
                    <td class="t_col"><?php echo $row['telephone']  ?></td>
                    <td class="inn_col"><?php echo $row['inn']  ?></td>
                    <td class="kpp_col"><?php echo $row['kpp']  ?></td>
<!--                    <td class="commentary_col">--><?php //echo $row['commentary']  ?><!--</td>-->

<!--                    <td class="osnovnoi_dogovor_contragent_col">--><?php //echo $row['osnovnoi_dogovor_contragent']  ?><!--</td>-->


                    <td>
                        <a href="edit_contragent_1c7.php?contragent_id=<?php echo $row['id'] ?>">Edit  </a>|| <a href="?delete_id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contragent?')"> Delete </a>
                    </td>
                </tr>
                <?php
            }
        }
    }else
    {
        $getAllContragents = $contragent_1c7->getAllContragents();
        $i=0;
        if($getAllContragents){
            while($row = $getAllContragents->fetch_assoc()){
                $i++;

                ?>
                <tr>
                    <td><?php echo $i  ?></td>
                    <td class="name_col"><?php echo $row['name']  ?></td>
                    <td class="naimnovanie_polnoe_col"><?php echo $row['naimnovanie_polnoe']  ?></td>
                    <td class="u_col"><?php echo $row['ur_fiz_litso']  ?></td>
                    <td class="ad_col"><?php echo $row['pochtavoi_address']  ?></td>
                    <td class="t_col"><?php echo $row['telephone']  ?></td>
                    <td class="inn_col"><?php echo $row['inn']  ?></td>
                    <td class="kpp_col"><?php echo $row['kpp']  ?></td>
<!--                    <td class="commentary_col">--><?php //echo $row['commentary']  ?><!--</td>-->
<!--                    <td class="osnovnoi_dogovor_contragent_col">--><?php //echo $row['osnovnoi_dogovor_contragent']  ?><!--</td>-->


                    <td>
                        <a href="edit_contragent_1c7.php?contragent_id=<?php echo $row['id'] ?>">Edit  </a>|| <a href="?delete_id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contragent?')"> Delete </a>
                    </td>
                </tr>
                <?php
            }
        }

    }
    ?>




</table>
