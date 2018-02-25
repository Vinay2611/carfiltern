<?php include_once ('header.php');?>

<div id="content">
    <div class="p30">
        <div class="container">
            <div class="row">

                <div class="grid_4  wrap col4">
                    <aside>
                        <div class="sidebar">
                            <h3 id="head3"><span id="total_cars">0</span> Car Found</h3>
                            <!--<h3 id="head3">Just nu, <span id="total_cars">0</span> bilar att välja på</h3>-->
                            <div class="well">
                                <label class="sr-only" for="searchbox">Search Make, Model</label>
                                <input type="text" class="form-text" id="searchbox" placeholder="Search Make, Model" autocomplete="off">
                            </div>
                            <br>
                            <div class="well">
                                <fieldset id="mileage_criteria">
                                    <legend>Monthly Cost</legend>
                                    <div style="text-align: center;font-size: large;">
                                        <span id="monthly_range_label" class="slider-label">1&nbsp 000 - 15&nbsp 000</span><br>
                                    </div>
                                    <div id="monthly_slider" class="slider">
                                    </div>
                                    <input type="hidden" id="monthly_filter" value="1000-15000">
                                </fieldset>
                            </div>
                            <br>
                            <div class="well">
                                <fieldset id="sort_criteria">
                                    <legend>Sort By</legend>
                                    <select class="form-control" id="sort_filter">
                                        <option value="">Alla</option>
                                        <option value="asc monthly_cost*1">Monthly Cost</option>
                                        <option value="asc brand">Make & Model</option>
                                        <!--<option value="asc model">Modell</option>-->
                                        <option value="asc fuel_consumtion*1">Fuel Consuption</option>
                                        <option value="desc horse_power*1">Horse Power</option>
                                        <option value="desc size_cargo*1">Size Cargo</option>
                                    </select>
                                </fieldset>
                            </div>
                            <br>
                            <div class="well">
                                <fieldset id="category_criteria">
                                    <legend>Category</legend>
                                    <table>
                                        <tr style="width: 100%;">
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="Smabil">
                                                    <img src="assets/icon/small.png" class="catimg_class cat_opacity" alt="Liten"/>
                                                    <span>Small<span>
                                                </div>
                                            </td>
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="Mellan">
                                                    <img src="assets/icon/sedan.png" class="catimg_class cat_opacity" alt="Mellan"/>
                                                    <span>Medium</span>
                                                </div>
                                            </td>
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="Kombi">
                                                    <img src="assets/icon/stationvagon.png" class="catimg_class cat_opacity" alt="Kombi"/>
                                                    <span>Kombi</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="width: 100%;">
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="SUV">
                                                    <img src="assets/icon/zeepiconew.png" class="catimg_class cat_opacity" alt="SUV"/>
                                                    <span> SUV </span>
                                                </div>
                                            </td>
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="Minibus">
                                                    <img src="assets/icon/minivan.png" class="catimg_class cat_opacity" alt="Minibus"/>
                                                    <span> Minibuss </span>
                                                </div>
                                            </td>
                                            <td style="width: 33.33333333%">
                                                <div class="checkbox text-center">
                                                    <input type="checkbox" name='checked_id' class="cat_class" value="Sport">
                                                    <img src="assets/icon/sport.png" class="catimg_class cat_opacity" alt="Sport"/>
                                                    <span> Sport </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <br>
                            <div class="well">
                                <fieldset id="year_criteria">
                                    <legend>Rentel Year</legend>
                                    <select class="form-control" id="year_filter">
                                        <option value="">All</option>
                                        <option value="2">2 Year</option>
                                        <option value="3">3 Year</option>
                                    </select>
                                </fieldset>
                            </div>
                            <br>
                            <div class="well">
                                <div class="col-md-6">
                                    <fieldset id="year_criteria">
                                        <legend>GearBox</legend>
                                        <select class="form-control" id="gearbox">
                                            <option value="">All</option>
                                            <option value="Automat">Automatic</option>
                                            <option value="Manuell">Manual</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset id="year_criteria">
                                        <legend>Fuel</legend>
                                        <select class="form-control" id="fuel">
                                            <option value="">All</option>
                                            <option value="Bensin">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Hybrid/EI">Hybrid/EI</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset id="year_criteria">
                                        <legend>Seats</legend>
                                        <select class="form-control" id="seats">
                                            <option value="">All</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset id="year_criteria">
                                        <legend>Drivetrain</legend>
                                        <select class="form-control" id="drivetrain">
                                            <option value="">All</option>
                                            <option value="Framhjulsdriven">Framhjulsdriven</option>
                                            <option value="Bakhjulsdriven">Bakhjulsdriven</option>
                                            <option value="Fyrhjulsdriven">Fyrhjulsdriven</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <div class="grid_8  wrap col8">
                    <!--<section>
                        <div class="slider_wrapper">
                            <div id="camera_wrap">
                                <div data-src="assets/images/car/car1.jpg">
                                    <div class="camera_caption">
                                        <div class="year">2014</div>
                                        <div class="cam_wrap">
                                            <div class="title">$89,965 <span>BMW 328i Gran Turismo </span></div>
                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu.</p>
                                        </div>
                                    </div>
                                </div>
                                <div data-src="assets/images/car/car2.jpg">
                                    <div class="camera_caption">
                                        <div class="year">2014</div>
                                        <div class="cam_wrap">
                                            <div class="title">$119,965 <span>BMW 5 Series</span></div>
                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu.</p>
                                        </div>
                                    </div>
                                </div>
                                <div data-src="assets/images/car/car3.jpg">
                                    <div class="camera_caption">
                                        <div class="year">2014</div>
                                        <div class="cam_wrap">
                                            <div class="title">$189,965 <span>Mercedes-Benz C63 AMG</span></div>
                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>-->

                    <section>
                        <div id="sliderbar">
                            <div id="slider">
                                <div id="carcontent" class="carlisting"></div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once ('footer.php');?>

<script>
    $(document).ready(function(){
        initSliders();
        var searchIDs = $('input[name="checked_id"]:checked').map(function(){
            return $(this).val();
        });
        category = searchIDs.get();
        var newHeight = $("#maindiv").height();
        var newWidth = $("#maindiv").width();
        $("#myprogress").height(newHeight);
        $("#myprogress").width(newWidth);
        years = $('#year_filter').val();
        getCars();

    });
</script>
