<?php 
	session_start();
	include 'db.php';
	
	if(isset($_POST['add_ans']))
	{
		$content=mysqli_real_escape_string($conn,strip_tags($_POST['content']));
		$id=mysqli_real_escape_string($conn,strip_tags($_POST['q_id']));
		$one=1;
		$ans_insert="INSERT INTO answers (q_id,a_provider,a_content,u_id,a_status) VALUES ('$id','$_SESSION[name]','$content','$_SESSION[login]','$one')";
		if(mysqli_query($conn,$ans_insert))
		{
			?><script>window.location = "answers.php"; </script> <?php
		}
		else
				?><script>window.location = "main.php"; </script> <?php
			
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Answers Page</title>
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
			<style>
				h1.hidden{
					display:none;
				}
			</style>
		</head>
		<body>
			<br>
			
			<div class='jumbotron'>
			<?php  include 'header.php' ;?>
			<br><br>
			<div class="row">
				<div class='col-md-3'>
					
					</div>
					<div class='col-md-6' >
						<div class='jumbotron' style='padding-top:10px; border:0.5px solid #c2c2d6; padding-bottom:10px;'>
							
								<div class='text-muted'  style='padding-left:10px; border-bottom:1px solid  #c2c2d6;'>
									<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-question-diamond-fill' style='font-size:20px;' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
										<path fill-rule='evenodd' d='M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM6.57 6.033H5.25C5.22 4.147 6.68 3.5 8.006 3.5c1.397 0 2.673.73 2.673 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.355H7.117l-.007-.463c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.901 0-1.358.603-1.358 1.384zm1.251 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z'/>
									</svg>
									Questions for you
									<br><br>
								</div>
								<br>
								
									<div class='row'>
									<table class='table'>
									<?php
										$c=1;
											$sql="SELECT * FROM questions  ORDER BY q_id DESC";
											$run=mysqli_query($conn,$sql);
											while($rows=mysqli_fetch_assoc($run))
											{
												echo"
															<tr>
																<th style='font-size:20px;'>$c.  $rows[q_content]</th>																	
															</tr>
															<tr>
																<td ><b> Ans.</b>
																	<form style='margin-left:34px ' method='POST'>
																		<textarea id='content' name='content' class='form-control' rows='3'></textarea>
																	<input id='q_id' name='q_id' style='visibility:hidden' value=$rows[q_id]>
																</td>
															</tr>
															<tr style='border-bottom:2px solid #c2c2d6'>
																<td>
																	<button id='add_ans' name='add_ans' style='margin-left:34px' class='btn btn-info' type='submit'>Submit</button>
																
																</td>
															</tr>
															</form>
																<br>
														</div>	
													";
													$c++;
											}
											?>
							</table>
					</div>
					<div class='col-md-3'>
					</div>
			</div>
		</body>
	</html>