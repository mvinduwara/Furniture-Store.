<?php
require "../content/connection.php";
session_start();

if (isset($_SESSION["admin"])) {

?>
	<!DOCTYPE html>
	<html lang="en" dir="ltr">
	<meta http-equiv="content-type" content="UTF-8" />

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
		<title>parlo</title>

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
									<h3 class="card-title">Product management</h3>
									<button onclick="window.print();"><i class="fa fa-file" aria-hidden="true"></i></button>
									
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
											<thead>
												<tr>
													<th>product name</th>
													<th>product quantity</th>
													<th>product price</th>
													<th>date added</th>
													<th>status</th>
													<th>action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$product_resultset = Database::search("SELECT * FROM `product`
												INNER JOIN `status` ON `status`.`status_id` = `product`.`status_id` ");
												$product_count = $product_resultset->num_rows;


												for ($i = 0; $i < $product_count; $i++) {
													$product_data = $product_resultset->fetch_assoc();
													$product_id = $product_data["product_id"];
												?>

													<tr>
														<td><?php echo $product_data["product_name"]  ?></td>
														<td><?php echo $product_data["product_quantity"]  ?></td>
														<td><?php echo $product_data["product_price"]  ?></td>
														<td><?php echo $product_data["product_datetime_added"] ?></td>
														<td><?php echo $product_data["status_type"]  ?></td>
														<td>
															<button type="button" class="btn btn-outline-danger btn-sm button-icon "><i class="fe fe-plus "><a href="update-product.php?product_id=<?php echo $product_id; ?>"></i>More</a></button>
														</td>
														<td><button type="button" class="btn btn-icon  btn-dark" onclick="changestatusproduct('<?php echo $product_id; ?>')"><i class="fa fa-random"></i></button></td>
														<td><button type="button" class="btn btn-icon  btn-danger" onclick="deleteproduct('<?php echo $product_id; ?>')" ><i class="fa fa-trash"></i></button></td>
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
					<span> Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-primary">Valex</a>.
						Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko
						</a> All rights reserved.</span>
				</div>
			</div>
			<!-- END MAIN-FOOTER -->

		</div>
		<!-- END PAGE-->


		<!-- SCRIPTS -->
		<script src="js/script.js" ></script>
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

		<!--INTERNAL CHART.BUNDLE JS -->
		<script src="build/assets/plugins/chart.js/Chart.bundle.min.js"></script>

		<!--INTERNAL SPARKLINE JS -->
		<script src="build/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!-- RAPHAEL JS -->
		<script src="build/assets/plugins/raphael/raphael.min.js"></script>

		<!-- INTERNAL APEXCHART JS -->
		<link rel="modulepreload" href="build/assets/apexcharts.bb280ae7.js" />
		<script type="module" src="build/assets/apexcharts.bb280ae7.js"></script>

		<script src="build/assets/jquery.vmap.sampledata.js"></script>

		<!-- MODAL POPUP JS -->
		<link rel="modulepreload" href="build/assets/modal-popup.006cbddc.js" />
		<script type="module" src="build/assets/modal-popup.006cbddc.js"></script>

		<!-- INTERNAL MAP JS -->
		<script src="build/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="build/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

		<!-- INTERNAL INDEX JS -->
		<link rel="modulepreload" href="build/assets/index.4c4b0962.js" />
		<link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
		<script type="module" src="build/assets/index.4c4b0962.js"></script>
		<link rel="modulepreload" href="build/assets/index1.c04045e6.js" />
		<link rel="modulepreload" href="build/assets/apexcharts.common.556c9c64.js" />
		<script type="module" src="build/assets/index1.c04045e6.js"></script>

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