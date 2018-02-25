<?php include("header.php");?>
    <section id="middle">
        <header id="page-header">
            <h1>Cars</h1>
        </header>
        <div id="content" class="dashboard padding-20">
            <div id="panel-1" class="panel panel-default mypanel">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Cars</strong>
                    </span>
                    <a href="addcar.php" title="Add Car" class="opt pull-right btn btn-info btn-xs" style="margin-top:0;"><i class="fa fa-plus"></i> Add Car</a>
                    <a href="bulk_addcar.php" title="Add Bulk Car" class="opt pull-right btn btn-info btn-xs" style="margin-top:0;"><i class="fa fa-plus"></i> Bulk Upload</a>
                </div>
                <div class="panel-body ">
                    <div class="table-responsive">
                        <table class="table table-striped table-scrollable table-bordered table-hover sample_5" id="sample_5">
                            <thead>
                            <tr>
                                <th  class="">Brand</th>
                                <th  class="">Model</th>
                                <th  class="">Description</th>
                                <th  class="">Image</th>
                                <th  class="">Category</th>
                                <th  class="">Monthly Cost</th>
                                <th  class="">Popular Car</th>
                                <th  class="">Recommended</th>
                                <th  class="">Gear</th>
                                <th  class="">Seats</th>
                                <th  class="">Fuels</th>
                                <th  class="">CO<sub>2</sub> g/km</th>
                                <th  class="">Fuel Consumtion</th>
                                <th  class="">Size cargo</th>
                                <th  class="">Horse Power</th>
                                <th  class="">Drive</th>
                                <th  class="">Year</th>
                                <th  class="">Total Mileage</th>
                                <th  class="">Service </th>
                                <th  class="">Insurance </th>
                                <th  class="">Winter</th>
                                <th  class="">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i = 1;
                            $sql=mysqli_query($db,"SELECT * from products ORDER by brand asc");
                            /*$sql=mysqli_query($db,"SELECT * from products ORDER by monthly_cost * 1 asc");*/
                            while($row = mysqli_fetch_assoc($sql))
                            {
                                ?>
                                <tr class="odd gradeX" id='products<?php echo $row['id'];?>'>
                                    <td><?php echo $row['brand'];?></td>
                                    <td><?php echo $row['model'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><img style="max-width: 150px;" src="<?php echo isset($row['product_image']) && !empty($row['product_image'])?'../upload/'.$row['product_image']:'../upload/noimage.png';?>"></td>
                                    <td><?php echo $row['category'];?></td>
                                    <td><?php echo $row['monthly_cost'];?></td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn <?php echo $row['feature']==0?'btn-warning':'btn-success';?> btn-xs setfeature" data-id ="<?php echo $row['id'];?>" data-value="<?php echo $row['feature'];?>">Set Popular</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn <?php echo $row['status']==0?'btn-warning':'btn-success';?> btn-xs setrecommended" data-id ="<?php echo $row['id'];?>" data-value="<?php echo $row['status'];?>">Set Recommended</a>
                                    </td>
                                    <td><?php echo $row['gear'];?></td>
                                    <td><?php echo $row['seats'];?></td>
                                    <td><?php echo $row['fuel'];?></td>
                                    <td><?php echo $row['co'];?></td>
                                    <td><?php echo $row['fuel_consumtion'];?></td>
                                    <td><?php echo $row['size_cargo'];?></td>
                                    <td><?php echo $row['horse_power'];?></td>
                                    <td><?php echo $row['drive'];?></td>
                                    <td><?php echo $row['year']." år";?></td>
                                    <td><?php echo $row['total_mileage'];?></td>
                                    <td><?php echo $row['service_include'];?></td>
                                    <td><?php echo $row['insurance_include'];?></td>
                                    <td><?php echo $row['wintertype_include'];?></td>
                                    <td  class="">
                                        <a href="addcar.php?id=<?php echo $row['id'];?>" title="Edit <?php echo "Edit Car". $row['model'];?>"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0);" title="Delete " title="Delete <?php echo "Edit Car". $row['model'];?>" class="deleteproduct" data-id="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php include("footer.php");?>

