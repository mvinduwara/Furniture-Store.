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

					<!-- BREADCRUMB -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
							<div>
								<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> welcome back Admin!</h2>
								<p class="mg-b-0">parlo Sales monitoring dashboard template.</p>
							</div>
						</div>
					</div>
					<!-- END BREADCRUMB -->

					<!-- ROW -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Payments</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered border text-nowrap mb-0">
											<thead>
												<tr>
													<th>invoice id</th>
													<th>Order id</th>
													<th>order date</th>
													<th>tatal amount</th>
													<th>product id</th>
													<th>user id</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$invoice_resultset = Database::search("SELECT * FROM `purchsed_history`");
												$invoice_count = $invoice_resultset->num_rows;

												for ($i = 0; $i < $invoice_count; $i++) {
													$invoice_data = $invoice_resultset->fetch_assoc();
												?>

													<tr>
														<td><?php echo $invoice_data["purchased_history_id"]  ?></td>
														<td><?php echo $invoice_data["order_id"]  ?></td>
														<td><?php echo $invoice_data["purchased_history_date"]  ?></td>
														<td><?php echo $invoice_data["purchased_history_amount"]  ?></td>
														<td><?php echo $invoice_data["product_id"]  ?></td>
														<td><?php echo $invoice_data["user_id"]  ?></td>
														<td>
															<div class="form-check form-switch mx-5">
																<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
															</div>
														</td>
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

					<!-- ROW -->
					<div class="row row-sm row-deck">
						<div class="col-md-12 col-lg-12">
							<div class="card card-table-two">
								<div class=" card-header p-0 d-flex justify-content-between">
									<h4 class="card-title mb-1">Your Most Recent Earnings</h4>
									<a href="javascript:void(0);" class="tx-inverse" data-bs-toggle="dropdown"><i class="mdi mdi-dots-horizontal text-gray"></i></a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="javascript:void(0);">Action</a>
										<a class="dropdown-item" href="javascript:void(0);">Another
											Action</a>
										<a class="dropdown-item" href="javascript:void(0);">Something Else
											Here</a>
									</div>
								</div>
								<span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's
									date.</span>
								<div class="table-responsive country-table">
									<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
										<thead>
											<tr>
												<th class="wd-lg-25p">Date</th>
												<th class="wd-lg-25p tx-right">Sales Count</th>
												<th class="wd-lg-25p tx-right">Earnings</th>
												<th class="wd-lg-25p tx-right">Tax Witheld</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>05 Dec 2019</td>
												<td class="tx-right tx-medium tx-inverse">34</td>
												<td class="tx-right tx-medium tx-inverse">$658.20</td>
												<td class="tx-right tx-medium tx-danger">-$45.10</td>
											</tr>
											<tr>
												<td>06 Dec 2019</td>
												<td class="tx-right tx-medium tx-inverse">26</td>
												<td class="tx-right tx-medium tx-inverse">$453.25</td>
												<td class="tx-right tx-medium tx-danger">-$15.02</td>
											</tr>
											<tr>
												<td>07 Dec 2019</td>
												<td class="tx-right tx-medium tx-inverse">34</td>
												<td class="tx-right tx-medium tx-inverse">$653.12</td>
												<td class="tx-right tx-medium tx-danger">-$13.45</td>
											</tr>
											<tr>
												<td>08 Dec 2019</td>
												<td class="tx-right tx-medium tx-inverse">45</td>
												<td class="tx-right tx-medium tx-inverse">$546.47</td>
												<td class="tx-right tx-medium tx-danger">-$24.22</td>
											</tr>
											<tr>
												<td>09 Dec 2019</td>
												<td class="tx-right tx-medium tx-inverse">31</td>
												<td class="tx-right tx-medium tx-inverse">$425.72</td>
												<td class="tx-right tx-medium tx-danger">-$25.01</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- END ROW -->

				</div>
			</div>
			<!-- END MAIN-CONTENT -->



			<!-- MESSAGE-MODAL -->
			<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-right chatbox" role="document">
					<div class="modal-content chat border-0">
						<div class="card overflow-hidden mb-0 border-0">
							<!-- action-header -->
							<div class="action-header clearfix">
								<div class="float-start hidden-xs d-flex ms-2">
									<div class="img_cont me-3">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img" alt="img">
									</div>
									<div class="align-items-center mt-2">
										<h4 class="text-white mb-0 fw-semibold">Daneil Scott</h4>
										<span class="dot-label bg-success"></span><span class="me-3 text-white">online</span>
									</div>
								</div>
								<ul class="ah-actions actions align-items-center">
									<li class="call-icon">
										<a href="javascript:void(0);" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#audiomodal">
											<i class="si si-phone"></i>
										</a>
									</li>
									<li class="video-icon">
										<a href="javascript:void(0);" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#videomodal">
											<i class="si si-camrecorder"></i>
										</a>
									</li>
									<li class="dropdown">
										<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
											<i class="si si-options-vertical"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-end">
											<li><i class="fa fa-user-circle"></i> View profile</li>
											<li><i class="fa fa-users"></i>Add friends</li>
											<li><i class="fa fa-plus"></i> Add to group</li>
											<li><i class="fa fa-ban"></i> Block</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);" class="" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true"><i class="si si-close text-white"></i></span>
										</a>
									</li>
								</ul>
							</div>
							<!-- action-header end -->

							<!-- msg_card_body -->
							<div class="card-body msg_card_body">
								<div class="chat-box-single-line">
									<abbr class="timestamp">February 1st, 2019</abbr>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Hi, how are you Jenna Side?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										Hi Connor Paige i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="build/assets/img/users/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										You welcome Connor Paige
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="build/assets/img/users/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="build/assets/img/users/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="build/assets/img/users/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="build/assets/img/users/9.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="build/assets/img/users/6.jpg" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Okay Bye, text you later..
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<!-- msg_card_body end -->
							<!-- card-footer -->
							<div class="card-footer">
								<div class="msb-reply d-flex">
									<div class="input-group">
										<input type="text" class="form-control " placeholder="Typing....">
										<div class="input-group-text bg-transparent border-0 p-0">
											<button type="button" class="btn btn-primary ">
												<i class="far fa-paper-plane" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div><!-- card-footer end -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MESSAGE-MODAL -->

			<!-- MAIN-FOOTER -->
			<div class="main-footer">
				<div class="container-fluid pd-t-0 ht-100p">
					<span> Copyright © <span id="year"></span><span>All rights reserved.</span>
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