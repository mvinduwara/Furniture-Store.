<?php
require "../../viva-project/content/connection.php";
session_start();



	if (isset($_GET["user_id"])) {
		$user_id = $_GET["user_id"];

	?>
		

	<!DOCTYPE html>
	<html lang="en" dir="ltr">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Valex - Larvel Admin Dashboard Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template">

		<!-- FAVICON -->
		<link rel="icon" href="build/assets/img/brand/favicon.png" type="image/x-icon">

		<!-- TITLE -->
		<title> parlo</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="build/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- ICONS CSS -->
		<link href="build/assets/iconfonts/icons.css" rel="stylesheet">

		<!-- ANIMATE CSS -->
		<link href="build/assets/iconfonts/animate.css" rel="stylesheet">

		<!-- APP SCSS & APP CSS -->
		<link rel="preload" as="style" href="build/assets/app.373b329f.css" />
		<link rel="preload" as="style" href="build/assets/app.dc980a30.css" />
		<link rel="stylesheet" href="build/assets/app.373b329f.css" />
		<link rel="stylesheet" href="build/assets/app.dc980a30.css" />


	</head>

	<body class="ltr main-body app sidebar-mini">

		<!--- GLOBAL LOADER -->
		<div id="global-loader">
			<img src="build/assets/img/svgicons/loader.svg" class="loader-img" alt="loader">
		</div>
		<!--- END GLOBAL LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div>
				<!-- MAIN-HEADER -->
				<?php require "./includes/header.php";  ?>
				<!-- END MAIN-HEADER -->

				<!-- MAIN-SIDEBAR -->
				<?php require "./includes/side.php";  ?>
				<!-- END MAIN-SIDEBAR -->

			</div>

			<!-- MAIN-CONTENT -->
			<div class="main-content app-content">
				<div class="main-container container-fluid">
					<?php
					$user_detail_resultset = Database::search("SELECT * FROM `user` 
					INNER JOIN `status` ON `status`.`status_id` = `user`.`user_status_id` WHERE `user_id`='" . $user_id . "' ");
					$user_details_count = $user_detail_resultset->num_rows;

					for ($i = 0; $i < $user_details_count; $i++) {
						$user_details_data = $user_detail_resultset->fetch_assoc();


					?>
						<!-- ROW -->
						<div class="row ">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="mb-4 main-content-label">User Personal Information</div>
										<form class="form-horizontal">
											<div class="mb-4 main-content-label">Name</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Name</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="User Name" value="<?php echo $user_details_data["user_firstname"] ." ". $user_details_data["user_lastname"]; ?>">
													</div>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">First Name</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="First Name" value="<?php echo $user_details_data["user_firstname"]; ?>">
													</div>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">last Name</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="Last Name" value="<?php echo $user_details_data["user_lastname"]; ?>">
													</div>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Email</label>
													</div>
													<div class="col-md-9">
														<input type="email" class="form-control" placeholder="Nick Name" value="<?php echo $user_details_data["user_email"]; ?>">
													</div>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Gender</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="Designation" value="<?php echo $user_details_data["user_gender"]; ?>">

													</div>
												</div>
											</div>


											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Birthdate</label>
													</div>
													<div class="col-md-9">
														<input type="date" class="form-control" placeholder="Designation" value="<?php echo $user_details_data["user_birthdate"]; ?>">
													</div>
												</div>
											</div>


											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Joined Date</label>
													</div>
													<div class="col-md-9">
														<input type="date" class="form-control" placeholder="Designation" value="<?php echo $user_details_data["user_joined_date"]; ?>">
													</div>
												</div>
											</div>

											<div class="mb-4 main-content-label">Contact Info</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">Email<i>(required)</i></label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="Email" value="<?php echo $user_details_data["user_email"]; ?>">
													</div>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Contact Number</label>
													</div>
													<div class="col-md-9">
														<input type="text" class="form-control" placeholder="Website" value="<?php echo $user_details_data["user_contact"]; ?>">
													</div>
												</div>
											</div>
											<div class="mb-4 main-content-label">User Address</div>
											<?php 
											$user_address = Database::search("SELECT * FROM `user_address` WHERE `user_id` = '" . $user_id . "'");
											$user_address_data = $user_address->fetch_assoc();
											?>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-3">
														<label class="form-label">User Address</label>
													</div>
													<div class="col-md-9">
													<textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address"><?php echo $user_address_data["user_address_number"] . ' ' . $user_address_data["user_address_line01"] . ' ' . $user_address_data["user_address_line02"]; ?></textarea>
													</div>
												</div>
											</div>

										</form>
									</div>
									<!-- <div class="card-footer">
									<button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
								</div> -->
								</div>
							</div>
							<!-- /Col -->
						</div>
						<!-- END ROW -->
					<?php
					}
					?>



				</div>
			</div>
			<!-- END MAIN-CONTENT -->


			<!-- MAIN-FOOTER -->
			<div class="main-footer">
				<div class="container-fluid pd-t-0 ht-100p">
					<span> Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-primary">Valex</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko </a> All rights reserved.</span>
				</div>
			</div>
			<!-- END MAIN-FOOTER -->

		</div>
		<!-- END PAGE-->


		<!-- SCRIPTS -->
		<!-- BACK TO TOP -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQUERY MIN JS -->
		<script src="build/assets/plugins/jquery/jquery.min.js"></script>

		<!-- BOOTSTRAP BUNDLE JS -->
		<script src="build/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="build/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- MOMENT JS -->
		<script src="build/assets/plugins/moment/moment.js"></script>

		<!-- EVA-ICONS JS -->
		<script src="build/assets/plugins/eva-icons/eva-icons.min.js"></script>

		<!-- PERFECT-SCROLLBAR JS  -->
		<script src="build/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="build/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

		<!-- SIDEBAR JS -->
		<script src="build/assets/plugins/sidebar/sidebar.js"></script>
		<script src="build/assets/plugins/sidebar/sidebar-custom.js"></script>

		<!-- SIDEMENU JS -->
		<script src="build/assets/plugins/side-menu/sidemenu.js"></script>

		<!-- INTERNAL CHART BUNDLE JS -->
		<script src="build/assets/plugins/chart.js/Chart.bundle.min.js"></script>

		<!-- INTERNAL SELECT2 JS -->
		<script src="build/assets/plugins/select2/js/select2.min.js"></script>
		<link rel="modulepreload" href="build/assets/select2.e612808d.js" />
		<script type="module" src="build/assets/select2.e612808d.js"></script>
		<!-- STICKY JS -->
		<script src="build/assets/sticky.js"></script>

		<!-- THEMECOLOR JS -->
		<link rel="modulepreload" href="build/assets/themecolor.90b8af41.js" />
		<link rel="modulepreload" href="build/assets/switcher-styles.4356da03.js" />
		<link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
		<script type="module" src="build/assets/themecolor.90b8af41.js"></script>

		<!-- APP JS -->
		<link rel="modulepreload" href="build/assets/app.2478bfa4.js" />
		<link rel="modulepreload" href="build/assets/switcher-styles.4356da03.js" />
		<link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
		<script type="module" src="build/assets/app.2478bfa4.js"></script>

		<!-- SWITCHER JS -->
		<link rel="modulepreload" href="build/assets/switcher.88cd5d65.js" />
		<script type="module" src="build/assets/switcher.88cd5d65.js"></script>

		<!-- END SCRIPTS -->

	</body>

	</html>

<?php
}
?>

