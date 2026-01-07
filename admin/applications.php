<?php
  require '../includes/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> View Applications</title>

	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Hostel Management System, Admin Panel, View Applications, College Hostel" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--bootsrap -->

	<!-- css files -->
	<link rel="stylesheet" href="../web_home/css_home/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="../web_home/css_home/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="../web_home/css_home/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="inner-page-banner" id="home">
	<!--Header-->
	<header>
		<div class="container agile-banner_nav">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<h1><a class="navbar-brand" href="admin_home.php">VGI <span class="display"> </span></a></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="create_hm.php">Appoint Hostel Manager</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="students.php">Students</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="admin_contact.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="applications.php">Applications</a>
						</li>
			            <li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li>
								<a href="admin_profile.php">My Profile</a>
							</li>
							<li>
								<a href="../includes/logout.inc.php">Logout</a>
							</li>
						</ul>
					</li>

					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--Header-->
</div>
<!-- //banner -->
<br><br><br>

<section class="contact py-5">
	<div class="container">
			<div class="mail_grid_w3l">
				<h2 class="heading text-capitalize mb-sm-5 mb-4"> Pending Applications </h2>
				<div class="container">
				<table class="table table-hover">
    <thead>
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Hostel Applied</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
   	   $query = "SELECT a.Student_id, s.Fname, s.Lname, h.Hostel_name, a.Message FROM Application a JOIN Student s ON a.Student_id = s.Student_id JOIN Hostel h ON a.Hostel_id = h.Hostel_id WHERE a.Application_status = 1";
   	   $result = mysqli_query($conn,$query);
   	   if(mysqli_num_rows($result)==0){
   	   	  echo '<tr><td colspan="5">No Pending Applications</td></tr>';
   	   }
   	   else{
   	   	  while($row = mysqli_fetch_assoc($result)){
   	   	  	$student_id = $row['Student_id'];
   	   	  	$name = $row['Fname'] . ' ' . $row['Lname'];
   	   	  	$hostel = $row['Hostel_name'];
   	   	  	$message = $row['Message'];
   	   	  	echo "<tr>
   	   	  			<td>$student_id</td>
   	   	  			<td>$name</td>
   	   	  			<td>$hostel</td>
   	   	  			<td>$message</td>
   	   	  			<td><a href='../allocate_room.php?student=$student_id&hostel=$hostel' class='btn btn-primary'>Allocate Room</a></td>
   	   	  		</tr>";
   	   	  }
   	   }
   	   ?>
    </tbody>
    </table>
    </div>
			</div>
	</div>
</section>

<!--footer-->
<footer class="py-5">
	<div class="container py-md-5">
		<div class="footer-logo mb-5 text-center">
			<a class="navbar-brand" href="http://vgi.ac.in" target="_blank">VGI <span class="display"> UNIVERSITY</span></a>
		</div>
		<div class="footer-grid">

			<div class="list-footer">
				<ul class="footer-nav text-center">
					<li>
						<a href="admin_home.php">Home</a>
					</li>

					<li>
						<a href="students.php">Students</a>
					</li>
					<li>
						<a href="admin_contact.php">Contact</a>
					</li>
					<li>
						<a href="admin_profile.php">Profile</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="../web_home/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="../web_home/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- stats -->
	<script src="../web_home/js/jquery.waypoints.min.js"></script>
	<script src="../web_home/js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- start-smoth-scrolling -->
	<script src="../web_home/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="../web_home/js/move-top.js"></script>
	<script type="text/javascript" src="../web_home/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>