<?php include('header.php');?>
<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($db, "SELECT * FROM `products` WHERE `id` = '$id'");
    if(mysqli_num_rows($sql)>0)
    {
        $Data = mysqli_fetch_assoc($sql);
    }
    else
    {
        die("Access Denied");
    }
}
else{
    die("Access Denied");
}
?>

<div id="content">
    <div class="p30">
        <div class="container">
            <div class="row">
                <div class="grid_12 wrap deta12 deta1" id="marg">
                    <a href="./"><h4> Tillbaka </h4></a>
                    <section class="section">
                        <h2 class="binding"><?php echo $Data['brand']." ".$Data['model'] ?></h2>
                        <div class="row">
                            <div class="grid_5 carcol5">
                                <img class="bordered-content" id="carimage" src="<?php echo './upload/'.$Data['product_image'];?>"><br>
                                <b class="binding"><?php echo $Data['description']; ?></b>
                            </div>
                            <div class="grid_6 card6">
                                <attributes>
                                    <h3 style="color: red;">Fakta</h3>
                                    <div class="">
                                        <em>Kategori: <b class="binding"><?php echo $Data['category']; ?></b></em>
                                    </div>
                                    <div  class="">
                                        <em>Sittplatser: <b class="binding"><?php echo $Data['seats']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Bagageutrymme VDA liter: <b class="binding"><?php echo $Data['size_cargo']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Växellåda: <b class="binding"><?php echo $Data['gear']; ?></b></em>
                                    </div>
                                    <div  class="">
                                        <em>Bränsletyp: <b class="binding"><?php echo $Data['fuel']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Drivlina: <b class="binding"><?php echo $Data['drive']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Hästkrafter: <b class="binding"><?php echo $Data['horse_power']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Bränsleförbrukning: <b class="binding"><?php echo $Data['fuel_consumtion']; ?></b></em>
                                    </div>
                                    <div class="">
                                        <em>Co2 utsläpp: <b class="binding"><?php echo $Data['co']; ?></b></em>
                                    </div>
                                </attributes>

                                    <div class="r">
                                        <attributes>
                                        <h3 style="color: red;">Allmänna hyresvillkor</h3>
                                            <div class="grid_3 card3" style="margin-left: 0px;">
                                                <div class="control-group">
                                                    <b>Hyrseperiod</b><br>
                                                    <div class="scope">
                                                        &nbsp;<?php echo $Data['year']." år"; ?>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <b>Total körsträcka</b><br>
                                                    <?php echo $Data['total_mileage']; ?>&nbsp;mil
                                                </div>
                                            </div>
                                            <div class="grid_3 card3">
                                                <h4 class="heade4"><b class="binding"> <?php echo $Data['monthly_cost']; ?> kr/mån </b></h4>
                                                <p><?php echo isset($Data['service_include']) && $Data['service_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Service ingår</p>
                                                <p><?php echo isset($Data['insurance_include']) && $Data['insurance_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Försäkring ingår</p>
                                                <p><?php echo isset($Data['wintertype_include']) && $Data['wintertype_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Vinterhjul ingår</p>
                                            </div>
                                            <br>
                                            <?php if(!isset($_GET['view'])){ ?>
                                                <div class="text-center">
                                                    <button type="button" class="intres" id="myBtn">Intresseanmälan</button>
                                                </div>
                                            <?php }?>
                                            <div class = "clear"></div>
                                        </attributes>
                                    </div>
                            </div><!--grid 6 end-->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <br>
    <div class="p32">
        <div class="container" style="margin-left: 0px;">
            <div class="row">
                <?php if(!isset($_GET['view'])){ ?>
                <div class="grid_12 wrap wrap2 deta1" id="marg">
                    <section class="section">
                        <h2>Liknande bilar</h2>

                        <div class="panel-body carlisting">

                            <?php
                            $sql = "select * from products where category = '".$Data['category']."' and id != '$id' order by createdon desc limit 4";
                            $q1 = mysqli_query($db,$sql);
                            if(mysqli_num_rows($q1)>0)
                            {
                                $i=1;$n=4;
                                $data = "No Similar Car Found";
                                ob_start();
                                while($r1 = mysqli_fetch_assoc($q1))
                                {
                                    include dirname(__FILE__).'/template.php';
                                }
                                if(($i-1)%$n != 0)
                                {
                                    echo '</div></div>
                                        <div class = "clearfix"></div>';
                                }
                                $data = ob_get_clean();
                            }
                            echo $data;
                            ?>

                        </div>
                        <?php }?>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
    <br>
    <!-- Modal -->
    <div id="myModal" style="display: none;" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <span class="close">&times;</span>
                    <div class="clear"></div>
                    <h4 class="modal-title" id="head4">
                        Jag är intresserad av denna bil och önskar få kontakt med en bra och seriös bilförsäljare
                    </h4>
                </div>
                <div class="modal-body">
                    <form action="" id="order" method="post" >
                        <div class="form-group">
                            <label class="control-label">Namn</label>
                            <input type="text" id="name" name="name" placeholder="Namn"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telefonnummer</label>
                            <input type="number" id="phone" name="phone"  placeholder="Telefonnummer"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">E-post</label>
                            <input type="email" id="address" name="email"  placeholder="name@domain.xx"  class="form-control">
                        </div>
                         <div class="form-group">
                            <label class="control-label">Postnummer</label>
                            <input type="number" id="phone" name="zipcode"  placeholder="Postnummer"  class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <textarea rows="4" class="form-control" name="message" placeholder="Meddelande"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="FormID" id="order" value="<?php echo $_GET['id'];?>">
                            <input type="hidden" name="brand" id="order" value="<?php echo $Data['brand'];?>">
                            <input type="hidden" name="model" id="order" value="<?php echo $Data['model'];?>">
                            <input type="hidden" name="type" value="placedorder">
                            <input class="intres" type="submit" value="Skicka" >
                        </div>
                    </form>
                    <div class= "clearfix"></div>
                </div>
            </div>
        </div>
    </div>


<?php include('footer.php');?>
