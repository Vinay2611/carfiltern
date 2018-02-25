<?php include("header.php");?>
<?php
$users = mysqli_num_rows(mysqli_query($db, "SELECT * from products"));
$orders = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `order`"));
?>
			
<section id="middle">
    <header id="page-header">
            <h1>Dashboard</h1>
    </header>
    <div id="content" class="dashboard padding-20">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="box warning"><!-- default, danger, warning, info, success -->
                    <div class="box-title"><!-- add .noborder class if box-body is removed -->
                        <h4> Cars </h4>
                        <big class="block"><?php echo $users; ?></big>
                        <i class="fa fa-car"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="box info"><!-- default, danger, warning, info, success -->
                    <div class="box-title"><!-- add .noborder class if box-body is removed -->
                        <h4> Enquiry </h4>
                        <big class="block"><?php echo $orders; ?></big>
                        <i class="fa fa-info-circle"></i>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <br>
    <div class="col-md-12">
        <div id="panel-2" class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>Enquiry</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
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
                        $q3 = mysqli_query($db,"select t1.*,t2.model from `order` t1 join `products` t2 on t1.car_detail=t2.id order by date desc limit 10");
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