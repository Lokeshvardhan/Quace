<?php 
	session_start();
	include 'db.php';
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

				$("#add_ans").click(function() {

					content = $("#content").val();
					q_id=$("id").val();
					alert(content);
					alert(q_id);
					$.ajax({
						type: "POST",
						url: "answer_data_process.php",
						data: "content=" + content +"&q_id="+q_id,
						success: function (html) {
							alert(html);
							if (html == 'true') {
								window.location.href = "main.php";

							}
						},
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
			
			<div class="row">
				<div class='col-md-3'>
					
					</div>
					<div class='col-md-6' >
						<div class='jumbotron' style='padding-top:10px; border:0.5px solid #c2c2d6; padding-bottom:10px;'>
							<div>
								<div class='text-muted'  style='padding-left:10px; border-bottom:1px solid  #c2c2d6;'>
									<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-question-diamond-fill' style='font-size:20px;' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
										<path fill-rule='evenodd' d='M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM6.57 6.033H5.25C5.22 4.147 6.68 3.5 8.006 3.5c1.397 0 2.673.73 2.673 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.355H7.117l-.007-.463c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.901 0-1.358.603-1.358 1.384zm1.251 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z'/>
									</svg>
									Questions for you
									<br><br>
								</div>
							</div>
									<?php
			$c=1;
				$sql="SELECT * FROM questions ";
				$run=mysqli_query($conn,$sql);
				while($rows=mysqli_fetch_assoc($run))
				{
					echo"
								<div>
								<br>
								
									<div class='row'><b>$c.</b>
										<div style='padding-left:30px '>
											<h4 style='padding-bottom:10px; border-bottom:1px solid  #c2c2d6;'><b>$rows[q_content]</b></h4>
										</div>
									</div>
									<div class='row'>
										<div style='padding-left:50px;'>
										<a type='button' class='btn btn-info' data-toggle='modal' href='#staticBackdrop$rows[q_id]' style='font-size:15px; border-radius:7px;'>Type the Answer</a></div>
								</div>
								<div>
										<!-- Modal -->
										<div class='modal fade' id='staticBackdrop$rows[q_id]' data-backdrop='static' data-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
										  <div class='modal-dialog'>
											<div class='modal-content'>
											  <div class='modal-header'>
												<h4 class='modal-title' id='staticBackdropLabel' style='color:#0000b3;'>Answer</h4>
												
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												  <span aria-hidden='true'>&times;</span>
												</button>
											  </div>
											  <div class='modal-body'>
												
													<div class='jumbotron' style='box-sizing: border-box; direction: ltr; color:#008fb3;'><b>Tips to writing good answers </b>
														<ul>
															<li>Make sure your answer explain the question.</li>
															<li>Keep your answer as brief as you want .</li>
															<li>Double-check grammar and spelling.</li>
														</ul>
													</div>
														<br>
														<div class='row'>
															<div class='col-md-12'>
																<form method='POST'> 
																	<div class='form-group'>
																		<textarea class='form-control' id='content' rows='2' placeholder='Start writing your Answer ' required></textarea>
																	 </div><br>
																	 <div><h1 id='id'>$rows[q_id]</h1></div>
																	 <div class='form-group'>
																	 ";?>
																		<button type='submit' id='add_ans' onclick="question_id()" class='btn btn-info btn-lg btn-block' >Submit</button>
																	<?php echo"
																	 </div>
																</form>
															</div>
													</div>
												</div>
											  <div class='modal-footer'>
														<button type='button' class='btn btn-secondary btn-lg btn-block' data-dismiss='modal'>Close</button>
											  </div>
											</div>
										  </div>
										</div>
									</div>
									</div>
							";
							$c++;
				}
				?>
							
						</div>
					</div>
					<div class='col-md-3'>
					</div>
			</div>
		</body>
	</html>