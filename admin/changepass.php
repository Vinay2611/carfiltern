<?php include("header.php");?>	
<style>
.box label
{
	color:#000;
}
</style>			
<section id="middle">
    <header id="page-header">
            <h1>Change Password</h1>
    </header>
    <div id="content" class="padding-20">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default mypanel ">
                    <div class="panel-heading panel-heading-transparent">
                            <strong>Change Password</strong> 
                    </div>
                    <div class="panel-body">
                        <form  action="" id="adminchangepass" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>Current Password *</label>
                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-key"></i>
                                                <input type="password"  placeholder = "Please type your current password" class = "form-control" name = "current_password" id = "current_password" title = "Enter current password !" min="6" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>New Password *</label>
                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-key"></i>
                                                <input type="password"  placeholder = "Please enter your new password" class = "form-control" name = "new_password" id = "new_password"  title="Enter New Password"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label>Confirm Password *</label>
                                            <div class="fancy-form"><!-- input -->
                                                <i class="fa fa-key"></i>
                                                <input type="password"  placeholder = "Please retype your new password" class = "form-control" name = "confirm_password" id = "rpassword"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 text-center">
                                            <button type="submit" name = "updatepassword"  class="btn btn-info btn-md btn-submit" >Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>					
    </div>
</section>
<?php include("footer.php");?>


