<?php include("header.php");?>
<section id="middle">
    <header id="page-header">
            <h1>Orders</h1>
    </header>
    <div id="content" class="dashboard padding-20">
        <div id="panel-1" class="panel panel-default mypanel">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>Orders</strong>
                </span>
            </div>
            <div class="panel-body ">
                <div class="table-responsive">
                    <table class="table table-striped table-scrollable table-bordered table-hover sample_5" id="sample_5">
                        <thead>
                            <tr>
                                <th  class="">Sr. No.</th>
                                <th  class="">Order Date</th>
                                <th  class="">Name</th>
                                <!--<th  class="">Email</th>-->
                                <th  class="">Shipping Address</th>
                                <th  class="">Billing Address</th>
                                <th  class="">Price</th>
                                <th  class="">Payment Details</th>
                                <th  class="">Order Status</th>
                                <th  class="">Delivery Date</th>
                                <th  class="">Comment</th>
                                <th  class="">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                        $i = 1;
                        $sql=mysqli_query($db,"SELECT t1.name,t1.email,t2.* from login t1 join purchase_order t2 on t1.id=t2.user_id order by order_id asc");
                        while($row = mysqli_fetch_assoc($sql))
                        {	
                            ?>
                            <tr class="odd gradeX" id='order<?php echo $row['order_id'];?>'>
                                <td><?php echo $row['order_id'];?></td>
                                <td><?php echo date('Y-m-d g:i A',strtotime($row['order_date']));?></td>
                                <td><?php echo $row['name'];?></td>
                                <!--<td><?php echo $row['email'];?></td>-->
                                <td>
                                <?php echo $row['ship_address'].",<br>"
                                        .$row['ship_city'].", ".$row['ship_state']." ".$row['ship_zip'].",<br>"
                                        .$row['ship_country'];
                                ?>
                                </td>
                                <td>
                                <?php echo $row['bill_address'].",<br>"
                                        .$row['bill_city'].", ".$row['bill_state']." ".$row['bill_zip'].",<br>"
                                        .$row['bill_country'];
                                ?>
                                </td>
                                <td>
                                <?php
                                    echo "<b>Unit Price:</b>$".$row['book_price']."<br>";
                                    echo "<b>Quantity:</b>".$row['quantity']."<br>";
                                    echo "<b>Shipping Charge:</b>$".$row['ship_charge']."<br>";
                                    echo "<b>Total Price:</b>$".$row['total_price']."<br>";
                                ?>
                                </td>
                                <td>
                                <?php
                                    echo "<b>Payment Mode : </b>".$row['payment_mode']."<br>";
                                    echo "<b>Paid Price : </b>$".$row['paid_price']."<br>";
                                    echo "<b>Transaction Id : </b>".$row['txn_id']."<br>";
                                    echo "<b>Payment status : </b>".$row['payment_status']."<br>";
                                ?>
                                </td>
                                <td><?php echo $row['order_status'];?></td>
                                <td><?php echo isset($row['delivery_date']) && !empty($row['delivery_date'])?date('Y-m-d',strtotime($row['delivery_date'])):'';?></td>
                                <td><?php echo $row['comment'];?></td>
                                <td>
                                    <?php if($row['payment_status']!='Success') {?>
                                    <a href="javascript:void(0);" title="Delete <?php echo "Order ID ". $row['order_id'];?>" class="deleteorder" data-id="<?php echo $row['order_id'];?>"><i class="fa fa-trash"></i></a>
                                    <?php }else{?>
                                    <a href="editorder.php?id=<?php echo $row['order_id'];?>" title="Edit <?php echo "Order ID ". $row['order_id'];?>"><i class="fa fa-edit"></i></a>
                                    <?php }?>
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