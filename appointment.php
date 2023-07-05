<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
 session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>New Clinic a Medical Category Bootstrap Responsive Web Template | Appointment :: W3layouts </title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="New Clinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/app1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<?php include "header.php" ?>
	<!-- banner -->
<div class="banner_inner_content_agile_w3l">
	
</div>
	<!--//banner -->
	<?php
		 include 'Connection.php';
	    
		if (!isset($_SESSION['session_user'])) 
		{ 
			echo "<script>alert('please login');</script>";
			echo "<script>window.location ='login.php';</script>";
		
		}
		
	?>
	<div class="w3ls-banner">
	<div class="heading">
		<h1>Get an Appointment</h1>
	</div>
		<div class="container_1">
			<div class="heading">
				<h2>Please Enter Details</h2>
				<p>Fill the form below and submit your query we will contact you as soon as possible.</p>
			</div>
			<div class="agile-form">
				<form  method="post" enctype="multipart/form-data">
					<ul class="field-list">
						<li> 
							<label class="form-label">
								Your Problem (Disease)
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<textarea rows="5" cols="15" name="disease"></textarea>
							
							</div>
						</li>
						
						<li class="last-type"> 
							<label class="form-label">
								Choose Hospital
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select name="hospital">
									<option value="" disabled selected hidden >Choose Hospital</option>
									<?php
										$query ="Select * from hospital_details_table";
										$res= mysqli_query($con,$query);
										while($value = mysqli_fetch_array($res))
										{
									?>
									<option value ="<?php echo $value['h_id']; ?>"><?php echo $value['h_name']; ?>(<?php echo $value['h_city'];?>)</option>
									<?php
										}
									?>

								</select>

							</div>
						</li>						
						<!--<li> 
							<label class="form-label">
							   Date
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="date" name="adate" placeholder="Choose appointment date"  required>
							</div>
						</li>-->						
						<li class="last-type"> 
							<label class="form-label">
								Choose Time
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select name="time">
									<option value="" disabled selected hidden >Choose Time</option>
									<?php
										$query ="Select * from time_table";
										$res= mysqli_query($con,$query);
										while($value = mysqli_fetch_array($res))
										{
									?>
									<option value ="<?php echo $value['time_id']; ?>"><?php echo $value['time']; ?></option>
									<?php
										}
									?>

								</select>

							</div>
						</li>		
					</ul>
					<input type="submit" name="reg" value="Book Appointment">
				</form>	
				<?php
					if(isset($_POST['reg']))
					{
						
						$eop = $_SESSION['session_user'];
						$query = "select l_id from login_table where email_id ='$eop' or phone_no = '$eop'";
						$res = mysqli_query($con,$query);
						while($value = mysqli_fetch_array($res))
						{
							$lid = $value['l_id'];
							
						}
						$disease = $_POST['disease'];
						$hospital = $_POST['hospital'];
						$time = $_POST['time'];
						$date = date("Y-m-d",strtotime("tomorrow"));
						$query = "select * from token_table where h_id =$hospital and time_id=$time";
						$res = mysqli_query($con,$query);
						$num = mysqli_num_rows($res);
						//echo $num;
						if($num==0)
						{
							
							$query = "insert into token_table(h_id,time_id,tokens) values($hospital,$time,1)";
							$res = mysqli_query($con,$query);
							if($res)
							{
								$query = "insert into appointment_table(h_id,l_id,a_date,a_time,a_status) values($hospital,$lid,'$date',$time,1)";
								$res = mysqli_query($con,$query);
								if($res)
								{
									$caseno = mysqli_insert_id($con);
									$query = "insert into patient_detail_table(l_id,h_id,case_no,disease) values($lid,$hospital,$caseno,'$disease')";
									$res = mysqli_query($con,$query);
									if($res)
									{
										echo "<script>alert('Your Appointment Booked For Tomorrow ');</script>";
										
									}
								}
							}
							else
							{
								echo "Not Inserted".mysqli_error($con);
							}
						}
						else
						{
							$count =0;
							while($value = mysqli_fetch_array($res))
							{
								$count = $value['tokens'];
								$count = $count +1;
							}
							if($count>15)
							{
									echo "<script>alert('choose another time');</script>";
									
							}
							else
							{
								
								$query ="Update token_table set tokens = $count where h_id =$hospital and time_id=$time";
								$res = mysqli_query($con,$query);
								if($res)
								{
									$query = "insert into appointment_table(h_id,l_id,a_time,a_status) values($hospital,$lid,$time,1)";
									$res = mysqli_query($con,$query);
									if($res)
									{
										$caseno = mysqli_insert_id($con);
										$query = "insert into patient_detail_table(l_id,h_id,case_no,disease) values($lid,$hospital,$caseno,'$disease')";
										$res = mysqli_query($con,$query);
										if($res)
										{
											echo "<script>alert('Your Appointment Booked For Tomorrow ');</script>";

										}
									}
								}	
								else
								{
									echo "Not Updated".mysqli_error($con);
								}
							}
						}
						
						
					}
				?>
			</div>
		</div>
</div>
	<!-- footer -->
	<?php include "footer.php" ?>

	<!-- //footer -->
	<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					New Clinic
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/g7.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>