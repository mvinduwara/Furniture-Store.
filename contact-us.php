<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Parlo | Contact</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="wrapper">

        <!-- header-sestion -->
        <?php require "./content/header.php" ?>
        <!-- header-sestion -->

        <!--navigation-section-start-->
        <div class="breadcrumb-area pt-35 pb-35 bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">contact us </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--navigation-section-end-->

        <div class="contact-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="contact-info-area">
                            <h2>Get In Touch</h2>
                            <p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elituis. </p>
                            <div class="contact-info-wrap">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="sli sli-location-pin"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <p>Address goes here, street, Crossroad 123.</p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="sli sli-envelope"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <p><a href="#">info@example.com</a> / <a href="#">info@example.com</a></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="sli sli-screen-smartphone"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <p>+1 35 776 859 000 / +1 35 776 859 011</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form-section-start -->
                    <div class="col-lg-7 col-md-6">
                        <div class="contact-from contact-shadow">
                            <p class="form-messege text-danger"></p>
                            <form id="contact-form" action="./process/contactproess.php" method="POST">
                                <input name="user_name" type="text" placeholder="Name">
                                <input name="user_email" type="email" placeholder="Email">
                                <input name="user_subject" type="text" placeholder="Subject">
                                <textarea name="user_message" placeholder="Your Message"></textarea>
                                <button class="submit" type="submit" value="submit">Send Message</button>
                            </form>

                        </div>
                    </div>
                    <!-- form-section-end -->
                </div>
                <div class="contact-map pt-100">
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <!-- footer-start -->
        <?php require "./content/footer.php"; ?>
        <!-- footer-end-->
    </div>










    <!-- All JS is here
============================================ -->

    <!-- script.js -->
    <script src="assets/js/script.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>
    <!-- Ajax Mail -->
    <script src="assets/js/ajax-mail.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGM-62ap9R-huo50hJDn05j3x-mU9151Y"></script>
    <script>
        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                center: new google.maps.LatLng(40.709896, -73.995481),
                styles: [{
                        "featureType": "landscape",
                        "stylers": [{
                                "hue": "#FFBB00"
                            },
                            {
                                "saturation": 43.400000000000006
                            },
                            {
                                "lightness": 37.599999999999994
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "stylers": [{
                                "hue": "#FFC200"
                            },
                            {
                                "saturation": -61.8
                            },
                            {
                                "lightness": 45.599999999999994
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "stylers": [{
                                "hue": "#FF0300"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 51.19999999999999
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "stylers": [{
                                "hue": "#FF0300"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 52
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "stylers": [{
                                "hue": "#0078FF"
                            },
                            {
                                "saturation": -13.200000000000003
                            },
                            {
                                "lightness": 2.4000000000000057
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [{
                                "hue": "#00FF6A"
                            },
                            {
                                "saturation": -1.0989010989011234
                            },
                            {
                                "lightness": 11.200000000000017
                            },
                            {
                                "gamma": 1
                            }
                        ]
                    }
                ]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.709896, -73.995481),
                map: map,
                icon: 'assets/img/icon-img/2.png',
                animation: google.maps.Animation.BOUNCE,
                title: 'Snazzy!'
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>