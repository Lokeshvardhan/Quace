<?php
	include 'db.php';
	$ques="SELECT * FROM questions,answers WHERE answers.q_id = questions.q_id and answers.a_status=1 group by questions.q_id ";
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
					$ask="SELECT * FROM users,questions WHERE users.u_id =$ques_row[u_id] ";
					$ask_user=mysqli_query($conn,$ask);
					$user_row=mysqli_fetch_assoc($ask_user);
					echo" $user_row[u_name]
					</h6>
				</div>
			</div>
			";
				$c=1;
			  $ans="SELECT * FROM answers WHERE answers.q_id=$ques_row[q_id] LIMIT 3 ";
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