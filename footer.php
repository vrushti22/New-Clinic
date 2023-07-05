
<html>
	<head>
		<style>
			.rating {
			display: inline-flex;
			margin-top: -10px;
			flex-direction: row-reverse
		}

		.rating>input {
			display: none
		}

		.rating>label {
			position: relative;
			width: 28px;
			font-size: 35px;
			color:#fff;
			cursor: pointer
		}

		.rating>label::before {
			content: "\2605";
			position: absolute;
			opacity: 0
		}

		.rating>label:hover:before,
		.rating>label:hover~label:before {
			opacity: 1 !important
		}

		.rating>input:checked~label:before {
			opacity: 1
		}

		.rating:hover>input:checked~label:before {
			opacity: 0.4
		}
		
		</style>
	</head>
<div class="footer_top_agile_w3ls">
		<div class="container">
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>
Opp. Physical Research Laboratory
Nr. <span>Atira,Ahmedabad</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">newclinic@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+09187 8088 9436</li>
				</ul>
			</div>
			<div class="col-md-4 footer_grid">
				<h3>Site Map</h3>
			<ul class="footer_grid_list">
				<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="index.php" >Home</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="about.php" >About</a>
					</li>
					
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="department.php" >Hospital</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="insurance.php" >Insurance</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="mail.php" >Contact Us</a>
					</li>
				</ul>
			</div>
			<!--<div class="col-md-3 footer_grid">
				<h3>Latest News</h3>
				
					
				
			</div>-->
			
			<div class="col-md-4 footer_grid ">
				<h3>FeedBack</h3>
				<div class="footer_grid_right">

					<form action="#" method="post">
								<div class="rating"> <input type="radio" name="rating1" value="5" id="5"><label for="5">☆</label> &ensp;&ensp; <input type="radio" name="rating2" value="4" id="4"><label for="4">☆</label> &ensp;&ensp;<input type="radio" name="rating3" value="3" id="3"><label for="3">☆</label>&ensp;&ensp; <input type="radio" name="rating4" value="2" id="2"><label for="2">☆</label>&ensp;&ensp; <input type="radio" name="rating5" value="1" id="1"><label for="1">☆</label> </div>
								<select name="hospital">
									<option value="" disabled selected hidden >Choose Hospital</option>
									<?php
									include "Connection.php";
										$query ="Select * from hospital_details_table";
										$res= mysqli_query($con,$query);
										while($value = mysqli_fetch_array($res))
										{
									?>
									<option value ="<?php echo $value['h_id']; ?>"><?php echo $value['h_name']; ?>(<?php echo $value['h_city'];?>)</option>
									<?php
										}
									?>

								</select><br/><br/>
								<textarea cols = "10" rows="3" name="comment" placeholder="Enter Comment">
							
								</textarea>
					
						<input type="submit" value="Submit" name="feedback">
					</form>
				<?php
					include "Connection.php";
					
					if(isset($_POST['feedback']))
					{
						
						$eop = $_SESSION['session_user'];
						$rat = 0;
						if(isset($_POST['rating1']))
						{
							$rat = $rat+1;
						}
						if(isset($_POST['rating2']))
						{
							$rat = $rat+1;
						}
						if(isset($_POST['rating3']))
						{
							$rat = $rat+1;
						}
						if(isset($_POST['rating4']))
						{
							$rat = $rat+1;
						}
						if(isset($_POST['rating5']))
						{
							$rat = $rat+1;
						}
						$hid = $_POST['hospital'];
						$comment = $_POST['comment'];
						$query = "select l_id from login_table where email_id ='$eop' or phone_no = '$eop'";
						$res = mysqli_query($con,$query);
						while($value = mysqli_fetch_array($res))
						{
							$id = $value['l_id'];
							
						}
						$query = "insert into feedback_table(l_id,h_id,rating,comment)values($id,$hid,$rat,'$comment')";
						$res = mysqli_query($con,$query);
						if(!$res)
						{
							echo "<h1 style='color:white;'>Not Inserted".mysqli_error($con)."</h1>";
						}
					}

				?>
				</div>
			</div>
			<div class="clearfix"> </div>

		</div><br/>
		<hr style="width:80%;color:#CDDCDC;">
			<p align="center" style="color:#fffff"> Developed by Shah Vrushti , Patel Urvi , Thakkar Devanshi , Trivedi Shruti</p>
	</div>
	
</html>