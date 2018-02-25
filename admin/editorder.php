<?php include("header.php");
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(mysqli_query($db, "SELECT t1.name,t1.email,t2.* from login t1 join purchase_order t2 on t1.id=t2.user_id and t2.order_id = '$id'"));
}

?>

<section id="middle">
    <header id="page-header">
            <h1>Order</h1>
    </header>
    <div id="content" class="dashboard padding-20">
        <div class="panel panel-default mypanel ">
            <div class="panel-heading panel-heading-transparent">
                <strong>Edit Order</strong> 
            </div>
            <div class="panel-body">
                <div class="col-md-4 inside_div">
                    <h4>User Detail</h4>
                     <?php
                        echo "<b>Name : </b>".$data['name']."<br>";
                        echo "<b>Email : </b>".$data['email']."<br><br>";
                    ?>
                </div>
                <div class="col-md-4 inside_div">
                    <h4>Shipping Address</h4>
                    <?php echo $data['ship_address'].",<br>"
                        .$data['ship_city'].", ".$data['ship_state']." ".$data['ship_zip'].",<br>"
                        .$data['ship_country'];
                    ?>
                </div>
                <div class="col-md-4 inside_div">
                    <h4>Billing Address</h4>
                    <?php echo $data['bill_address'].",<br>"
                        .$data['bill_city'].", ".$data['bill_state']." ".$data['bill_zip'].",<br>"
                        .$data['bill_country'];
                    ?>
                </div>
                <div class="col-md-4 inside_div">
                    <h4>Order Detail</h4>
                    <?php
                        echo "<b>Unit Price : </b>$".$data['book_price']."<br>";
                        echo "<b>Quantity : </b>".$data['quantity']."<br>";
                        echo "<b>Shipping Charge : </b>$".$data['ship_charge']."<br>";
                        echo "<b>Total Price : </b>$".$data['total_price']."<br>";
                    ?>
                </div>
                <div class="col-md-4 inside_div">
                    <h4>Payment Detail</h4>
                    <?php
                        echo "<b>Payment Mode : </b>".$data['payment_mode']."<br>";
                        echo "<b>Order Date : </b>".date('Y-m-d g:i A',strtotime($data['order_date']))."<br>";
                        echo "<b>Paid Price : </b>$".$data['paid_price']."<br>";
                        echo "<b>Transaction Id : </b>".$data['txn_id']."<br>";
                        
                    ?>
                </div>
                <div class="clearfix"></div>
                <br>
                <form  action="" method="post" id ="update_order" enctype="multipart/form-data">
                    <fieldset>
                        <div class="inside_div1">
                            <div class ="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Order Status</label>
                                        <select class="form-control "  name="order_status" id = "flat_status"  title = "Select Order Status!">
                                            <option value="">--- Select ---</option>
                                            <option <?php echo isset($data['order_status']) && $data['order_status']=='Confirmed'?'selected':''?> value="Confirmed">Confirmed</option>
                                            <option <?php echo isset($data['order_status']) && $data['order_status']=='Shipped'?'selected':''?> value="Shipped">Shipped</option>
                                            <option <?php echo isset($data['order_status']) && $data['order_status']=='Delivered'?'selected':''?> value="Delivered">Delivered</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Delivery Date</label>
                                        <input type="text"  placeholder = "Delivery Date" class="form-control datepicker"  name = "delivery_date" value="<?php echo isset($data['delivery_date'])?$data['delivery_date']:'';?>" title = "Enter Delivery Date!"   >
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Comment</label>
                                        <textarea  placeholder = "Comment" class="form-control"  name = "comment" title = "Enter Comment!"><?php echo isset($data['comment'])?$data['comment']:'';?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <input type="hidden" value="EditOrder" name="type">
                                    <input type="hidden" name="orderID" value="<?php echo isset($data['order_id']) ? $data['order_id'] : '' ?>">
                                    <button type="submit" class="btn btn-info btn-md btn-submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>	
</section>


<?php include("footer.php");?>