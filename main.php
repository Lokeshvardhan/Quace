<?php 
	session_start();
	include 'db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="css\all.css">		
		<link rel="stylesheet" href="css\bootstrap.css">
		<link rel="stylesheet" href="css\master.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>	
		<style>
			body
			{
					background-image:url("images/img3.jpg");
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
		<script>
			$(document).ready(function () {

						$("#add_que").click(function () {

							content = $("#content").val();
							category= $("#category").val();

							$.ajax({
								type: "POST",
								url: "question_adding.php",
								data: "content=" + content +"&category="+category,
								success: function (html) {
									if (html == 'true') {

										$("#add_err2").html('<div class="alert alert-success"> \
															 <strong>Question</strong> Added. \ \
															 </div>');

										window.location.href = "main.php";

									} else if (html == 'category') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Question Category</strong> is missing. \ \
															 </div>');
															 
									} else if (html == 'contentnull') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Please enter valid question.</strong>  . \ \
															 </div>');

									} else if (html == 'content') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															 <strong>Please explain your question briefly.</strong>  . \ \
															 </div>');

									}else {
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
		<div class="container-fluid" >
			<?php 
				include 'header.php';
			?>
			<br><br>
				<div class="main">
				<aside style="width:22%; float:left; background:#ecf2f9; border:0.5px solid #4d4d4d; border-radius:10px;">
					<br>
					<div >
						<?php 
							$cat_sql="SELECT * FROM question_category";
							$cat_run=mysqli_query($conn,$cat_sql);
							while($cat_rows=mysqli_fetch_assoc($cat_run))
							{
								$category=$cat_rows['cat_name'];
								echo "
									<a href='category.php?category=$category' style='width:100%; border:2px solid #0086b3 ;  margin-bottom:10px; font-size:20px' class='btn btn-info'>$cat_rows[cat_name]</a><br>
							";}?>
							<?php
							echo"
						
					</div>
				</aside>";?>
				<section style="width:76%; background:#ecf2f9; border:2px solid #4d4d4d; margin-left:2%; float:right;">
					
						<?php 
							include 'homesection.php';
						?>
				</section>
			</div>
		</div>
	</body>
	
	
	
	
	
	
</html>