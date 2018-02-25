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
            <h1>Car</h1>
        </header>
        <div id="content" class="dashboard padding-20">
            <div id="panel-1" class="panel panel-default mypanel">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong><?php echo isset($_GET['id'])?'Edit Car':'Add Car'; ?></strong>
                    </span>
                </div>

                <div class="panel-body">
                    <form action="" id="insert_products" method="POST">

                        <filedset>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Brand (Märke)</label>
                                        <input type="text" class="form-control" name="brand" value="<?php echo isset($FormData['brand'])?$FormData['brand']:''; ?>" placeholder="Brand (Märke)" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Model</label>
                                        <input type="text" class="form-control" name="model" value="<?php echo isset($FormData['model'])?$FormData['model']:''; ?>" placeholder="Model">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Description(Beskrivning)</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Description(Beskrivning)" required><?php echo isset($FormData['description'])?$FormData['description']:''; ?></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Car Image(bil Bild)</label>
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
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Smabil'?'selected':'';?> value="Smabil">Smabil</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Mellan'?'selected':'';?> value="Mellan">Mellan</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Kombi'?'selected':'';?> value="Kombi">Kombi</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='SUV'?'selected':'';?> value="SUV">SUV</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Minibus'?'selected':'';?> value="Minibus">Minibus</option>
                                            <option <?php echo isset($FormData['category']) && $FormData['category']=='Sport'?'selected':'';?> value="Sport">Sport</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Monthly cost (månadskostnad)</label>
                                        <input type="number" class="form-control" placeholder="Monthly cost(månadskostnad)" name="monthly_cost" value="<?php echo isset($FormData['monthly_cost'])?$FormData['monthly_cost']:''; ?>"  required>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Gear (växellåda)</label>
                                        <select name="gear" class="form-control" required>
                                            <option <?php echo isset($FormData['gear']) && $FormData['gear']=='Alla'?'selected':'';?> value="Alla">Alla</option>
                                            <option <?php echo isset($FormData['gear']) && $FormData['gear']=='Automat'?'selected':'';?> value="Automat">Automat</option>
                                            <option <?php echo isset($FormData['gear']) && $FormData['gear']=='Manuell'?'selected':'';?> value="Manuell">Manuell</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <label>Seats (sittplatser)</label>
                                        <select name="seats" class="form-control" required>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='2'?'selected':'';?> value="2">2</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='3'?'selected':'';?> value="3">3</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='4'?'selected':'';?> value="4">4</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='5'?'selected':'';?> value="5">5</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='6'?'selected':'';?> value="6">6</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='7'?'selected':'';?> value="7">7</option>
                                            <option <?php echo isset($FormData['seats']) && $FormData['seats']=='8'?'selected':'';?> value="8">8</option>
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
                                            <option <?php echo isset($FormData['fuel']) && $FormData['fuel']=='Alla'?'selected':'';?> value="Alla">Alla</option>
                                            <option <?php echo isset($FormData['fuel']) && $FormData['fuel']=='Bensin'?'selected':'';?> value="Bensin">Bensin</option>
                                            <option <?php echo isset($FormData['fuel']) && $FormData['fuel']=='Diesel'?'selected':'';?> value="Diesel">Diesel</option>
                                            <option <?php echo isset($FormData['fuel']) && $FormData['fuel']=='Hybrid/EI'?'selected':'';?> value="Hybrid/EI">Hybrid/EI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Co2 g/km</label>
                                        <input type="number" class="form-control" name="co" value="<?php echo isset($FormData['co'])?$FormData['co']:''; ?>" placeholder="Co2 g/km" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Fuel consumtion (bränsleförbrukning)</label>
                                        <input type="number" step="0.01" class="form-control" name="fuel_consumtion" value="<?php echo isset($FormData['fuel_consumtion'])?$FormData['fuel_consumtion']:''; ?>" placeholder="Fuel consumtion (bränsleförbrukning)" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Size Cargo space (bagegeutrymme VDA liter)</label>
                                        <input type="text" class="form-control" name="size_cargo" value="<?php echo isset($FormData['size_cargo'])?$FormData['size_cargo']:''; ?>"  placeholder="Size Cargo space (bagegeutrymme VDA liter)" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Horsepower (hästkrafter)</label>
                                        <input type="text" class="form-control" name="horse_power" value="<?php echo isset($FormData['horse_power'])?$FormData['horse_power']:''; ?>" placeholder="Horsepower (hästkrafter)" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Drive (drivlina)</label>
                                        <select class="form-control" name="drive" required>
                                            <option <?php echo isset($FormData['drive']) && $FormData['drive']=='Framhjulsdriven'?'selected':'';?> value="Framhjulsdriven">Framhjulsdriven</option>
                                            <option <?php echo isset($FormData['drive']) && $FormData['drive']=='Bakhjulsdriven'?'selected':'';?> value="Bakhjulsdriven">Bakhjulsdriven</option>
                                            <option <?php echo isset($FormData['drive']) && $FormData['drive']=='Fyrhjulsdriven'?'selected':'';?> value="Fyrhjulsdriven">Fyrhjulsdriven</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Years (Hyresperiod)</label>
                                        <select class="form-control" name="year" required>
                                            <option <?php echo isset($FormData['year']) && $FormData['year']=='2'?'selected':'';?> value="2">2 år</option>
                                            <option <?php echo isset($FormData['year']) && $FormData['year']=='3'?'selected':'';?> value="3">3 år</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Total Mileage (total körsträcka)</label>
                                        <input type="number" class="form-control" name="total_mileage" value="<?php echo isset($FormData['total_mileage'])?$FormData['total_mileage']:''; ?>" placeholder="Total Mileage (total körsträcka)" required>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <label>Service Included (service ingår)</label>
                                        <select name="service_include" class="form-control" required>
                                            <option <?php echo isset($FormData['service_include']) && $FormData['service_include']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['service_include']) && $FormData['service_include']=='No'?'selected':'';?> value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Insurance Included (försäkring ingår)</label>
                                        <select name="insurance_include" class="form-control" required>
                                            <option <?php echo isset($FormData['insurance_include']) && $FormData['insurance_include']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['insurance_include']) && $FormData['insurance_include']=='No'?'selected':'';?> value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label>Wintertyres Included (vinterhjul ingår)</label>
                                        <select name="wintertype_include" class="form-control" required>
                                            <option <?php echo isset($FormData['wintertype_include']) && $FormData['wintertype_include']=='Yes'?'selected':'';?> value="Yes">Yes</option>
                                            <option <?php echo isset($FormData['wintertype_include']) && $FormData['wintertype_include']=='No'?'selected':'';?> value="No">No</option>
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