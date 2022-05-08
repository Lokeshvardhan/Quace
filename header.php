<?php
	include 'db.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius:7px;">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon "></span>
			  </button>

			  <div class="collapse navbar-collapse nav-tabs" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto " style="padding-right:30px;">
				  <li class="nav-item active" style="padding-right:40px; padding-left:20px;">
					<a class="nav-link" href="main.php"><h3><strong style="color:#0086b3;">HOME </strong></h3><span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item active" style="padding-right:30px;">
					<a class="nav-link" href="answers.php"><h3><strong style="color:#0086b3;">ANSWER </strong></h3></a>
				  </li>
				  
				</ul>
				<div>
					<ul class="navbar-nav mr-auto " style="padding-right:30px;">
				  <li class="nav-item active" style="padding-right:40px; padding-left:20px;">
					<!-- Example single danger button -->
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop" style="font-size:24px; border-radius:7px;">Ask a Question</button>
						<!-- Modal -->
						<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h4 class="modal-title" id="staticBackdropLabel" style="color:#e60000;">Add Question</h4>
								
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								
									<div class="jumbotron" style="box-sizing: border-box; direction: ltr; color:#008fb3;"><b>Tips on getting good answers quickly</b>
										<ul>
											<li>Make sure your question has not been asked already.</li>
											<li>Keep your question short and to the point.</li>
											<li>Double-check grammar and spelling.</li>
										</ul>
									</div>
									<div>
										<div class="row">
											<div class="col-md-1 float-right">	
												<svg width="1em" height="1em" viewBox="0 0 16 16" style="font-size:20px; color:#007a99;" class="bi bi-person-bounding-box" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												  <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
												  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
												</svg>
											</div>
											<div class="col-md-5 float-left">
												<span class="text-muted" style="font-size:15px; color:#007a99;"><?php echo "$_SESSION[name]"; ?> asked</span>
											</div>
											
												<form method="POST"> 
												<div class="col-md-9 float-right">
													<div class="form-group">
														<input list="cities" placeholder="Category" id='category' name="category" class="form-control" required>
														<datalist id="cities" required>
														<?php 
														$cat_sql="SELECT * FROM question_category";
														$cat_run=mysqli_query($conn,$cat_sql);
														while($cat_rows=mysqli_fetch_assoc($cat_run))
														{
															echo "
															<option>$cat_rows[cat_name]</option>	
														";}?>
															
														</datalist>
													</div>
												</div>
										</div><br>
										<div class="row">
											<div class="col-md-12">
												
													<div class="form-group">
														<textarea class="form-control" id="content" rows="2" placeholder="Start your question with What , When , Why" required></textarea>
													 </div><br>
													 <div class="form-group">
														<div id="add_err2"></div>
														<button type="submit" id="add_que" class="btn btn-info btn-md btn-block" >Add</button>
													 </div>
												</form>
											</div>
										</div>
									</div>
								</div>
							  <div class="modal-footer">
										
										<button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
							  </div>
							</div>
						  </div>
						</div>
					</li>
					<div class="dropdown" style="border-radius:7px;">
						<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" style="color:#00394d;">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" style="font-size:30px;" xmlns="http://www.w3.org/2000/svg">
						  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
						  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
						  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
						</svg>
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1" style="width:250px;">
							<li class="dropdown-item">
								<center><h3 style="color:#004d66;">User Information</h3></center>
								
							</li>
							<div class="dropdown-divider"></div>
							<li class="dropdown-item">
								<div class="row">
									<div class="col-md-3" style="color:#007399">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person " fill="currentColor" style="font-size:20px;  "><" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
									  <path d="M13.784 14c-.497-1.27-1.988-3-5.784-3s-5.287 1.73-5.784 3h11.568z"/>
									  <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
									</svg>
									</div>
									<div style="color:#007a99">
											<?php 
												echo "$_SESSION[name]";
											?>
									</div>
								</div>
							</li>
							<div class="dropdown-divider"></div>
							<li class="dropdown-item">
								<div class="row">
									<div class="col-md-3" style="color:#007399">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" style="font-size:20px;" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
									</svg>
									</div>
									<div style="color:#007a99">
											<?php 
												echo "$_SESSION[email]";
											?>
									</div>
								</div>
							</li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="logout.php">
								<div class="row">
									<div class="col-md-3" style="color:#007399">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" style="font-size:20px;"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
									  <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
									  <path fill-rule="evenodd" d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/>
									</svg>
									</div>
										<h5 style="color:#008fb3">Log Out</h5>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" onClick=\"javascript: return confirm('Please confirm deletion');\" href="delete_user.php">
								<div class="row">
									<div class="col-md-3" style="color:#007399">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .
									  5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
									  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 
									  1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 
									  4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
									</div>
										<h5 style="color:#008fb3">Delete Account</h5>
								</div>
							</a>
						</ul>
					</div>
					</ul>
				</div>
			  </div>
			</nav>