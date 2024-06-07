<?php
require "../../viva-project/content/connection.php";
session_start();

if (isset($_SESSION["admin"])) {

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

					<!-- ROW -->
					<div class="row mt-3">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
								<h3 class="card-title">User management</h3>
									<button onclick="window.print();"><i class="fa fa-file" aria-hidden="true"></i></button>
								</div>

								<div class="main-header-center d-lg-block col-8 offset-2">
									<input class="form-control" placeholder="Search for anything..." type="search" id="search_user" onkeypress="searchuser(event);"> <button class="btn"></button>
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
											<thead>
												<tr>
													<th>First name</th>
													<th>Last name</th>
													<th>user email</th>
													<th>joined date</th>
													<th>status</th>
													<th>action</th>
												</tr>
											</thead>
											<tbody id="searchTable">
												<?php
												$user_resultset = Database::search("SELECT * FROM `user` 
											INNER JOIN `status` ON `status`.`status_id` = `user`.`user_status_id` ");
												$user_resultset_count = $user_resultset->num_rows;

												for ($i = 0; $i < $user_resultset_count; $i++) {
													$user_resultset_data = $user_resultset->fetch_assoc();
													$user_id = $user_resultset_data["user_id"];

												?>
													<tr>
														<td><?php echo $user_resultset_data["user_firstname"]; ?></td>
														<td><?php echo $user_resultset_data["user_lastname"]; ?></td>
														<td><?php echo $user_resultset_data["user_email"]; ?></td>
														<td><?php echo $user_resultset_data["user_joined_date"]; ?></td>
														<td><?php echo $user_resultset_data["status_type"]; ?></td>
														<td>
															<button type="button" class="btn btn-outline-danger btn-sm button-icon "><i class="fe fe-plus "><a href="user-profile.php?user_id=<?php echo $user_id; ?>"></i>More</a></button>
														</td>
														<td><button type="button" class="btn btn-icon  btn-dark" ><i class="fa fa-random" onclick="changestatus('<?php echo $user_id; ?>')"></i></button></td>
														<td><button type="button" class="btn btn-icon  btn-danger" onclick="deleteuser('<?php echo $user_id; ?>')" ><i class="fa fa-trash"></i></button></td>

													</tr>
												<?php
												}

												?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END ROW -->

				</div>
			</div>
			<!-- END MAIN-CONTENT -->


		<!-- MAIN-FOOTER -->
		<div class="main-footer">
				<div class="container-fluid pd-t-0 ht-100p">
					<span> Copyright © <span id="year"></span><span>All rights reserved.</span>
				</div>
			</div>

		</div>
		<!-- END PAGE-->


		<!-- SCRIPTS -->
		<script src="js/script.js"></script>

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
} else {
	header("Location: signin.php");
}
?>