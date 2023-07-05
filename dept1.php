<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<title>New Clinic a Medical Category Bootstrap Responsive Web Template | Departments :: W3layouts </title>
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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel ="Stylesheet" href="c1.css">
	<link href="css/appointment_style.css" rel="stylesheet" type="text/css" media="all" />
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
	<!-- departments -->
	<script>
		$(document).ready(function(){
			$("select.city").change(function(){
				var city = $(this).children("option:selected").val();
				<?php $city = "<script>document.write(city)</script>"?>   
			});
		});
	
	</script>
	<form >
		<select class="city" style="color:#146eb4;background-color: #CDDCDC;font-weight:bold;font-size:25px;" >
			<option value="" disabled selected hidden >Choose Your Nearest Location</option>
			<option value="Ahmedabad" style="background-color:#FFFFFF;" >Ahmedabad</option>
			<option  value="Gandhinagar" style="background-color:#FFFFFF;" >Gandhinagar</option>
			<option value="Rajkot" style="background-color:#FFFFFF;" >Rajkot</option>
			<option value="Jamnagar" style="background-color:#FFFFFF;" >Jamnagar</option>
			<option value="Chandkheda" style="background-color:#FFFFFF;" >Chandkheda</option>
		</select>

	</form>

		
		<?php echo $city;?>

	<div class="team">
	<div class="container">
		<h3 class="heading-agileinfo">Government Hospitals<span>We offer extensive medical procedures to outbound and inbound patients.</span></h3>
		
			<?php	
				include 'Connection.php';
				$query = "select * from hospital_details_table";
				$res = mysqli_query($con,$query);
				if(!$res)
					
					echo "Not Fetched".mysqli_error($con);
				while($value = mysqli_fetch_array($res))
				{
					
			?>
		<div class="mycard">
			<div class="diva">
				<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value['h_image']); ?>" width="100%" height="100%">
			</div>
			
			<div class="divb">
				<b><a href="hospitaldetails.php?id=<?php echo $value['h_id'];?>" class ="read-agileits"><?php echo $value['h_name']; ?></a><br/>
				
				
			</div>			
		</div>
		<?php
				}
				echo "<br/>";
				
			?>
		
	</div>
</div>
<!-- //departments -->
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