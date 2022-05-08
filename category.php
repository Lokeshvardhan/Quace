<?php 

	session_start();
	include 'db.php';
?>
<html>
	<head>
		<title>Category</title>
		<link rel="stylesheet" href="css\all.css">		
		<link rel="stylesheet" href="css\bootstrap.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>	
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

									}else {
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
	<body>
		<div class='container-fluid'>
			<?php include 'header.php';?>
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
					$ques="SELECT * FROM questions q JOIN answers a ON q.q_id=a.q_id WHERE q.q_cat='$_GET[category]' GROUP BY q.q_id";
					$ques_show=mysqli_query($conn,$ques);
					while($ques_row=mysqli_fetch_assoc($ques_show)){
					echo"
					<div style='margin:15px; background:#b3cce6;'>
						<div style='border:1px solid #737373;'>
							<div style='border-bottom:2px solid black;'>
								<div class='row' style='margin-left:4px; margin-top:5px;'>
									<div class='col-sm-1-'><h3>Q.</h3></div>
									<div class='col-md-11'>
										<h3>$ques_row[q_content]</h3>
									</div>
								</div>
								<div style='text-align:right; margin-right:4px;'>
									<h6>By:";
									$ask="SELECT * FROM users WHERE u_id =$ques_row[u_id] LIMIT 1";
									$ask_user=mysqli_query($conn,$ask);
									$user_row=mysqli_fetch_assoc($ask_user);
									echo" $user_row[u_name]
									
									</h6>
								</div>
							</div>
							";
								$c=1;
							  $ans="SELECT * FROM answers WHERE q_id=$ques_row[q_id] AND a_status=1";
							  $ans_sql=mysqli_query($conn,$ans);
							  while($ans_row=mysqli_fetch_assoc($ans_sql)){
						echo"
							<div style='border-bottom:0.5px solid black;'>
								<div class='row' style='margin-left:4px; margin-top:5px;'>
									<div class='col-sm-2-'><p style='font-size:20px;'><b>Ans.$c</b></p></div>
									<div class='col-md-11' style='font-size:20px;'>
										<p >$ans_row[a_content]</p>
									</div>
								</div>
								<div style='text-align:right; margin-right:4px;'>
									<p>Answered By:$ans_row[a_provider]<p>
								</div>
							</div>
						  ";
						  $c++;}
						  echo "
					</div>
				</div>";}
				?>
				</section>
			</div>
		</div>
	</body>
</html>
