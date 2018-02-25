<?php include("header.php");?>
<section id="middle">
    <header id="page-header">
            <h1>Enquiry</h1>
    </header>
    <div id="content" class="dashboard padding-20">
        <div id="panel-1" class="panel panel-default mypanel">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>Enquiry</strong>
                </span>
            </div>
            <div class="panel-body ">
                <div class="table-responsive">
                    <table class="table table-striped table-scrollable table-bordered table-hover sample_5" id="sample_5">
                       <thead>
                            <tr>
                                <th>Car Model</th>
                                <th>Namn</th>
                                <th>E-post</th>
                                <th>Telefonnummer</th>
                                <th>Postnummer</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $q3 = mysqli_query($db,"select t1.*,t2.model from `order` t1 join `products` t2 on t1.car_detail=t2.id order by date desc");
                        while($r3 = mysqli_fetch_assoc($q3))
                        {
                            ?>
                        
                            <tr>
                                <td><?php echo $r3['model'];?></td>
                                <td><?php echo $r3['name'];?></td>
                                <td><?php echo $r3['email'];?></td>
                                <td><?php echo $r3['phone'];?></td>
                                <td><?php echo $r3['zipcode'];?></td>
                                <td><?php echo $r3['message'];?></td>
                                <td><a href="../cardetail.php?id=<?php echo $r3['car_detail'];?>&view=true" target='_blank' class="btn btn-default btn-xs btn-block ">View Car</a></td>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
   </div>	
</section>


<?php include("footer.php");?>