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
                        <p class="large">Регионы Db</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-12">
                    <?php
                    include ("../inc/db.php");
                    $sql = "SELECT 
                                   *
                                    
                                    FROM 
                                    
                                    states ";
                    $run = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($run);
                    $i=0;

                    if($count <= 0){
                        echo '<br><br>
                                   <div class="full center margin-bottom_30">
                                        <div class="heading_main text_align_center">
                                          <h4><span class="theme_color">Пустая</span> База</h4>
                                        </div>
                                    </div>
                             
                          ';
                    }else{
                        echo '
                           <table>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>country_id</th>
                                    <th>status</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                          ';
                        while($row = mysqli_fetch_array($run)){
                            $i++;
                            ?>
                            <tr>
                                <td data-column="Таб. номер" style="font-size: 12px"><?php  echo $i ?></td>
                                <td data-column="Таб. номер" style="font-size: 12px"><?php  echo $row['state_name'] ?></td>
                                <td data-column="ФИО" style="width: 20%;font-size: 12px"><?php  echo $row['country_id'] ?></td>
                                <td data-column="Дата" style="font-size: 12px"><?php  echo $row['status'] ?></td>


                            </tr>
                            <?php

                        }

                        echo '</table>';
                    }

                    ?>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- end section -->


<!-- Start Footer -->
<?php include ("../inc/footer.php")?>
