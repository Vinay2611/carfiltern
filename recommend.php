<?php include 'header.php';?>

<div id="content">
    <div class="p32">
        <div class="container">
            <div class="row">
                <div class="grid_12 wrap wrap2 deta12" id="marg">
                    <section class="section">
                        <h4>Vi rekommenderar</h4>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="p32">
        <div class="container">
            <div class="row">
                <div class="grid_12 wrap wrap2 deta12">
                    <section class="section">
                        <div class="panel-heading"><h4 id="head4">Bilar om vi tycker är extra prisvärda just nu </h4></div>
                        <div class="panel-body">
                            <?php
                            $data = "No recommendation found";
                            $sql = "select * from products where status = 1 order by createdon desc limit 4";
                            $q1 = mysqli_query($db,$sql);
                            if(mysqli_num_rows($q1)>0)
                            {
                                $i=1;$n=4;

                                ob_start();
                                while($r1 = mysqli_fetch_assoc($q1))
                                {
                                    include dirname(__FILE__).'/template.php';
                                }
                                if(($i-1)%$n != 0)
                                {
                                    echo '</div></div>
                                    <div class = "clear"></div>';
                                }
                                $data = ob_get_clean();
                            }
                            echo $data;
                            ?>
                        </div>

                    </section>
                </div>

            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include 'footer.php';?>
