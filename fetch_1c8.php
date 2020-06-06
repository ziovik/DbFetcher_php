<?php
include "lib/database_1c8.php";
spl_autoload_register(function ($class){
    include_once "classes/".$class.".php   ";
});

$contragent_1c8 = new Db_1C8();
?>
<div id="checkbox_div">

    <li><input type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);"> Наименование</li>
    <li><input type="checkbox" value="hide" id="naimnovanie_polnoe_col" onchange="hide_show_table(this.id);"> Наименование Полное</li>
    <li><input type="checkbox" value="hide" id="inn_col" onchange="hide_show_table(this.id);"> ИНН</li>
    <li><input type="checkbox" value="hide" id="kpp_col" onchange="hide_show_table(this.id);"> КПП</li>
    <li><input type="checkbox" value="hide" id="commentary_col" onchange="hide_show_table(this.id);"> Комментарий</li>

    <li><input type="checkbox" value="hide" id="okpo_col" onchange="hide_show_table(this.id);"> ОКПО</li>
    <li><input type="checkbox" value="hide" id="pokupatel_col" onchange="hide_show_table(this.id);"> Покупатель</li>
    <li><input type="checkbox" value="hide" id="postavshik_col" onchange="hide_show_table(this.id);"> Поставщик</li>
    <li><input type="checkbox" value="hide" id="ne_rezident_col" onchange="hide_show_table(this.id);">Резидент</li>
</div>

<table id="employee_table" align="center" cellpadding=10>
    <tr>
        <th>S.no</th>
        <th id="name_col_head">Наименование</th>
        <th id="naimnovanie_polnoe_col_head">Наименование Полное</th>

        <th id="inn_col_head">ИНН</th>
        <th id="kpp_col_head">КПП</th>
        <th id="commentary_col_head">Комментарий</th>
        <th id="okpo_col_head">ОКПО</th>
        <th id="pokupatel_col_head">Покупатель</th>
        <th id="postavshik_col_head">Поставщик</th>
        <th id="ne_rezident_col_head">Резидент</th>
        <th style="min-width: 120px">Action</th>
    </tr>
    <?php
       if (isset($_POST["query"]))
       {
            $search = $_POST["query"];
            $i=0;
            $searchContragent = $contragent_1c8->searchContragent($search);
            if($searchContragent){
                while($row = $searchContragent->fetch_assoc()){
                    $i++;
                    $pokupatel = $row['_Fld1535'];
                    $postavshik = $row['_Fld1536'];
                    $ne_rezident = $row['_Fld1540'];
                    ?>
                    <tr>
                        <td><?php echo $i  ?></td>
                        <td class="name_col"><?php echo $row['_Description']  ?></td>
                        <td class="naimnovanie_polnoe_col"><?php echo $row['_Fld1529']  ?></td>
                        <td class="inn_col"><?php echo $row['_Fld1524']  ?></td>
                        <td class="kpp_col"><?php echo $row['_Fld1528']  ?></td>
                        <td class="commentary_col"><?php echo $row['_Fld1527']  ?></td>

                        <td class="okpo_col"><?php echo $row['_Fld1526']  ?></td>
                        <td class="pokupatel_col">
                            <?php
                            if($pokupatel == '1'){
                                echo '<input checked type="checkbox" onclick="return false;">';
                            }else{
                                echo '<input  type="checkbox" onclick="return false;">';
                            }
                            ?>
                        </td>
                        <td class="postavshik_col">
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
                            <a href="edit_contragent_1c8.php?contragent_id=<?php echo $row['id'] ?>">Все Инфо  </a>
                            <br><hr> <a href="?delete_id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contragent?')"> Delete </a>

                        </td>
                    </tr>
                    <?php
                }
            }
       }else
        {
            $getAllContragents = $contragent_1c8->getAllContragents();
            $i=0;
             if($getAllContragents){
                 while($row = $getAllContragents->fetch_assoc()){
                     $i++;
                     $pokupatel = $row['_Fld1535'];
                     $postavshik = $row['_Fld1536'];
                     $ne_rezident = $row['_Fld1540'];
                     ?>
                     <tr>
                         <td><?php echo $i  ?></td>
                         <td class="name_col"><?php echo $row['_Description']  ?></td>
                         <td class="naimnovanie_polnoe_col"><?php echo $row['_Fld1529']  ?></td>
                         <td class="inn_col"><?php echo $row['_Fld1524']  ?></td>
                         <td class="kpp_col"><?php echo $row['_Fld1528']  ?></td>
                         <td class="commentary_col"><?php echo $row['_Fld1527']  ?></td>

                         <td class="okpo_col"><?php echo $row['_Fld1526']  ?></td>
                         <td class="pokupatel_col">
                             <?php
                             if($pokupatel == '1'){
                                 echo '<input checked type="checkbox" onclick="return false;">';
                             }else{
                                 echo '<input  type="checkbox" onclick="return false;">';
                             }
                             ?>
                         </td>
                         <td class="postavshik_col">
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
                             <a href="edit_contragent_1c8.php?contragent_id=<?php echo $row['id'] ?>">Все Инфо  </a
                             ><br><hr> <a href="?delete_id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this contragent?')"> Delete </a>
                         </td>
                     </tr>
                     <?php
                 }
             }

        }
    ?>




</table>
