<?php include("header.php");?>
<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $FormData = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `products` WHERE `id` = '$id'"));
}
?>

    <section id="middle" xmlns="http://www.w3.org/1999/html">
        <header id="page-header">
            <h1>Products</h1>
        </header>
        <div id="content" class="dashboard padding-20">
            <div id="panel-1" class="panel panel-default mypanel">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>Add Products</strong>
                    </span>
                </div>

                <div class="panel-body">
                    <form action="" id="insert_products" method="POST">

                        <filedset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Brand (Märke)</label>
                                        <input type="text" class="form-control" name="brand" value="<?php echo isset($FormData['brand'])?$FormData['brand']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Model</label>
                                        <input type="text" class="form-control" name="model" value="<?php echo isset($FormData['model'])?$FormData['model']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="" required><?php echo isset($FormData['description'])?$FormData['description']:''; ?></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Products Image</label>
                                        <div class="fancy-form"><!-- input -->
                                            <div class="input-group"><input class="custom-file-upload custom-file-upload-hidden" type="file" id="file" name="product_image"  accept="image/*" data-btn-text="Select a File" tabindex="-1" style="position: absolute; left: -9999px;">
                                                <small class="text-muted block">Max file size: 10Mb (jpg/png)</small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3">
                                        <label>Categori (kategori)</label>
                                        <select name="category" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='småbil'?'selected':'';?> value="småbil">småbil</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='mellan'?'selected':'';?> value="mellan">mellan</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='kombi'?'selected':'';?> value="kombi">kombi</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='suv'?'selected':'';?> value="suv">SUV</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='sport'?'selected':'';?> value="sport">sport</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Monthly cost (månadskostnad)</label>
                                        <input type="number" class="form-control" name="monthly_cost" value="<?php echo isset($FormData['monthly_cost'])?$FormData['monthly_cost']:''; ?>"  required>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Gear (växellåda)</label>
                                        <select name="gear" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Alla'?'selected':'';?> value="Alla">Alla</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Automat'?'selected':'';?> value="Automat">Automat</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='manualle'?'selected':'';?> value="manualle">manualle</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Seats (sittplatser)</label>
                                        <select name="seats" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='2'?'selected':'';?> value="2">2</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='3'?'selected':'';?> value="3">3</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='4'?'selected':'';?> value="4">4</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='5'?'selected':'';?> value="5">5</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='6'?'selected':'';?> value="6">6</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='7'?'selected':'';?> value="7">7</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='8'?'selected':'';?> value="8">8</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='9'?'selected':'';?> value="9">9</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='10'?'selected':'';?> value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Fuel (bränsletyp)</label>
                                        <select name="fuel" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Alla'?'selected':'';?> value="Alla">Alla</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Bensin'?'selected':'';?> value="Bensin">Bensin</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Diesel'?'selected':'';?> value="Diesel">Diesel</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Hybrid/EI'?'selected':'';?> value="Hybrid/EI">Hybrid/EI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Co2 g/km</label>
                                        <input type="number" class="form-control" name="co" value="<?php echo isset($FormData['co'])?$FormData['co']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Fuel consumtion (bränsleförbrukning)</label>
                                        <input type="number" class="form-control" name="fuel_consumtion" value="<?php echo isset($FormData['fuel_consumtion'])?$FormData['fuel_consumtion']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Size Cargo space (bagegeutrymme VDA liter)</label>
                                        <input type="text" class="form-control" name="size_cargo" value="<?php echo isset($FormData['size_cargo'])?$FormData['size_cargo']:''; ?>"  placeholder="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Horsepower (hästkrafter)</label>
                                        <input type="text" class="form-control" name="horse_power" value="<?php echo isset($FormData['horse_power'])?$FormData['horse_power']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Drive (drivlina)</label>
                                        <input type="number" class="form-control" name="drive" value="<?php echo isset($FormData['drive'])?$FormData['drive']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Years (Hyresperiod)</label>
                                        <select class="form-control" name="year" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='2 år'?'selected':'';?> value="2 år">2 år</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='3 år'?'selected':'';?> value="3 år">3 år</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Total Mileage (total körsträcka)</label>
                                        <input type="number" class="form-control" name="total_mileage" value="<?php echo isset($FormData['total_mileage'])?$FormData['total_mileage']:''; ?>" placeholder="" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Service Included (service ingår)</label>
                                        <select name="service_include" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='No'?'selected':'';?> value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Insurance Included (försäkring ingår)</label>
                                        <select name="insurance_include" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='No'?'selected':'';?> value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Wintertyres Included (vinterhjul ingår)</label>
                                        <select name="wintertype_include" class="form-control" required>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='No'?'selected':'';?> value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">

                                <input type="hidden" name="FormID" value="<?php echo isset($FormData['id'])?$FormData['id']:''?>">
                                <input type="hidden" name="type" value="insertproduct">
                                <input type="submit" class="btn btn-md  btn-success  btn-submit"  value="<?php echo isset($FormData['id'])?'Update':'Add' ?>" style = "width:20%;" >
                                <div class="clearfix"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include("footer.php");?>