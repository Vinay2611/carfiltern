<?php include("header.php");

$username = $_SESSION['username'];

if(isset($_POST['updatecustomer']))
{
	$fname = $_POST['fname'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$lname = $_POST['lname'];
	//$password = $_POST['password'];

	$q3 = mysqli_query($conn,"UPDATE `admin` SET `fname` = '$fname',`lname`= '$lname', mobile = '$contact' WHERE `userid` = '$username' ");
	if($q3)
	{
		$success = "Profile Updated successfully.";
	}
	else
	{
		$error = "Details not updated";
	}
}

$q4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `admin` WHERE `userid` = '$username'"));


?>			
			<section id="middle">
				<!-- page title -->
				<header id="page-header">
					<h1>Update Profile:  </h1> 
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

					<div class="row">

						<div class="col-md-12">
						
							<!-- ------ -->
							<div class="panel panel-default mypanel">
								<div class="panel-heading panel-heading-transparent">
									<strong>Profile Details</strong> 
								</div>

								<div class="panel-body">

										<form  action="" method="post" enctype="multipart/form-data">
											<fieldset>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>First Name *</label>
															<div class="fancy-form"><!-- input -->
																<i class="fa fa-user"></i>
																<input type="text" pattern = "[a-zA-Z ]{2,}" placeholder = "Full Name" class = "form-control" name = "fname" id = "fname" title="It must contain only letters and a length of minimum 2 characters!" value = "<?php echo $q4['fname'];?>" required autofocus>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Last Name *</label>
															<div class="fancy-form"><!-- input -->
																<i class="fa fa-user"></i>
																<input type="text" pattern = "[a-zA-Z ]{2,}" placeholder = "Full Name" class = "form-control" name = "lname" id = "lname" title="It must contain only letters and a length of minimum 2 characters!" value = "<?php echo $q4['lname'];?>" required autofocus>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Email *</label>
															<div class="fancy-form"><!-- input -->
																<i class="fa fa-envelope"></i>
																<input type="email" placeholder = "Email Id" pattern = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" class = "form-control" name = "email" id = "email" title = "It must contain a valid email address e.g. 'someone@provider.com' !" value = "<?php echo $q4['email'];?>" disabled required>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Contact</label>
															<div class="fancy-form"><!-- input -->
																<i class="fa fa-phone-square"></i>
																<input type="number" autocomplete = "off" placeholder = "Mobile Number" pattern = ".{7,}" class = "form-control" name = "contact" id = "contactNumber" title = "It must contain a valid 7 digits mobile number! e.g.6193498" value = "<?php echo $q4['mobile'];?>" >
															</div><!-- /input -->
														</div>
													</div>
												</div>

												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12 text-center">
															<button type="submit" name = "updatecustomer"  class="btn btn-info btn-md" >Update</button>
														</div>
														
													</div>
												</div>
											</fieldset>
										</form>

								</div>

							</div>
							<!-- /----- -->

						</div>

	

					</div>

				</div>
			</section>
			<!-- /MIDDLE -->

	<?php include("footer.php");?>
<?php 
	if(isset($success) || isset($error))
	{
		if( $success != "" ){ ?>
		<script>				
		
		_toastr("<?php echo $success; ?>","top-right","success",false);
		//location.replace("<?php echo $base_page;?>profile");			
		</script>
		
			<		
			
		<?php }  
			else if($error != "")
			{ ?>
				<script>				
					_toastr("<?php echo $error; ?>","top-right","error",false);		
				</script>
							
		<?php } 
	}
?>