<?php
/*if($i%$n==1)
{
    echo '<div class="grid_12 temp12"><div class="row">';
}
*/?>
    <div class="grid_3 temp3 <?php if($i%2!=0) echo "alpha"; else echo "omega";?>">
        <a href = 'cardetail.php?id=<?php echo $r1['id'];?>'>
            <div class="thumb m1">
                <img src="<?php echo isset($r1['product_image']) && !empty($r1['product_image'])?'upload/'.$r1['product_image']:'upload/noimage.png';?>" alt="<?php echo isset($r1['model'])?$r1['model']:"";?>">
                <div class="caption">
                    <h4 style="font-size: 18px;color: #e22323"><?php echo isset($r1['brand'])?$r1['brand']:"";?></h4>
                    <h5 style="color: black"><?php echo isset($r1['model'])?$r1['model']:"";?></h5>
                    <p><?php echo isset($r1['service_include']) && $r1['service_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Service ingår</p>
                    <p><?php echo isset($r1['insurance_include']) && $r1['insurance_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Försäkring ingår</p>
                    <p><?php echo isset($r1['wintertype_include']) && $r1['wintertype_include']=='Yes'?"<i class='fa fa-check tick' aria-hidden='true'></i>":"<i class='fa fa-times cross' aria-hidden='true'></i>";?> Vinterhjul ingår</p>
                    <h4 style="margin-top: 6px;text-align: right;color: #e22323;font-size: 22px;" class="text-right carprice"><?php echo isset($r1['monthly_cost'])?$r1['monthly_cost']:"";?> kr/mån</h4>
                    <a href='cardetail.php?id=<?php echo $r1['id'];?>' class="link3">Läs&nbspmer</a>
                </div>
            </div>
        </a>
    </div>
<?php
/*if($i%$n == 0)
{
    echo '</div></div>';
}
$i++;
*/?>