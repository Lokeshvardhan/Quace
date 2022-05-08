<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
		<link rel="stylesheet" href="css\all.css">		
		<link rel="stylesheet" href="css\bootstrap.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>	
		<style>
		body
		{
				background-image:url("images/img2.jpg");
				height: auto;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				width:100%;
				background-size: cover;
				margin-top: 60px;
			    display: flex;
				-webkit-flex-flow: column wrap;
				justify-content: center; 
				align-items: center;
			}
		</style>
		<script src="js\jquery.js"></script>
		<script type="text/javascript">
			        $(document).ready(function () {

						$("#register").click(function () {
			
							name = $("#name").val();
							fname = $("#fname").val();
							lname = $("#lname").val();
							email = $("#email").val();
							password = $("#password").val();
							confirm_pass = $("#confirm-password").val();
							number = $("#number").val();
							$.ajax({
								type: "POST",
								url: "user_register.php",
								data: "name=" + name +"&fname="+fname+ "&lname=" + lname +"&confirm_pass="+confirm_pass+ "&email=" + email + "&password=" + password+"&number="+number,
								
								success: function (html) {
									if (html == 'true') {

										$("#add_err2").html('<div class="alert alert-success"> \
															 <strong>Account</strong> processed. \ \
															 </div>');

										window.location.href = "main.php";

									} else if (html == 'false') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Email Address or Username</strong> already in system. \ \
															 </div>');                    

									} else if (html == 'name') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>First Name</strong> is required. \ \
															 </div>');
															 
									} else if (html == 'number') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Contact Number</strong> is required. \ \
															 </div>');

									} else if (html == 'eshort') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Email Address</strong> is required. \ \
															 </div>');

									} else if (html == 'eformat') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Email Address</strong> format is not valid. \ \
															 </div>');
															 
									} else if (html == 'pshort') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Password doesnt match</strong>  . \ \
															 </div>');

									} else {
										alert(html);
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Error</strong> processing request. Please try again. \ \
															 </div>');
									}
								},
								beforeSend: function () {
									$("#add_err2").html("Loading...");
								}
							});
							return false;
						});
					});
		</script>
	</head>
	<body >
		<div class="container">
			<div class="row"><div class="col-md-4"></div>
					<div class="col-md-4" >
					
								<div class="modal-body " style="background:#f0f0f5; border-radius:7px;">
									<hr><center><strong ><h4  >Registration Form</h4><hr></strong></center>
										<div id="add_err2"></div>
									<form class="form " method="POST" role="form" style="background:#f0f0f5; border-radius:4px;">
										
										<div class="form-input">
											<label >Username</label>
											<input type="text" name="name" class="form-control" placeholder="Username" maxlength="20" id="name">
											<span id="user-name"></span>
										</div>
										<div class="form-input">
											<label >First Name</label>
											<input type="text" name="fname" class="form-control" placeholder="First Name" maxlength="20" id="fname">
											<span id="user-name"></span>
										</div>
										<div class="form-input">
											<label >Last Name</label>
											<input type="text" name="lname" class="form-control" placeholder="Last Name" maxlength="20" id="lname">
											<span id="user-name"></span>
										</div>
										<div class="form-group">
											<label >Email address</label>
											<input type="email" id="email"  class="form-control" name="email"  placeholder="Email" maxlength="30"   aria-describedby="emailHelp">
											<div id="emailcheck">
											<small class="text-muted" >We'll never share your email with anyone else.</small>
											</div>
										</div>
										<div class="form-group">
											<label>Phone Number</label>
											<input type="text" name="number" class="form-control" placeholder="Phone Number" maxlength="10" id="number" >
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" placeholder="Password" maxlength="10" id="password" >
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" maxlength="10" id="confirm-password" >
										</div>
										<!--<div class="form-group">
											<label>Gender</label>
											<select >
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>  -->
										<button type="submit" name="register" id="register"class="btn btn-sm btn-primary">Register</button>
										<a href="userlogin.php" class=" float-right" style="color:#1a53ff;">Already Registered ?</a>
										<!--For Login Page -->
									</form>
								
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<br><br><br><br>
		</div>
		
	</body>
</html>