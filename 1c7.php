<?php include("inc/header_1c7.php") ?>
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
    $deleteContragentById = $contragent_1c7->deleteContragetById($contragent_id);
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
                        <h2><span class="theme_color">Контрагенты </span> в 1C7 </h2>
                        <p class="large">Database</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="contact-block">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <input style="color: #fff;font-style:italic;width: 50% ;margin: 0 auto" type="text" class="form-control" name="search_text" id="search_text" placeholder="искать Контрагент..." >

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div  id="result">

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


    $(document).ready(function () {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch_1c7.php",
                method: "POST",
                data: {query: query},
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            }
            else {
                load_data();
            }
        });
    });


</script>