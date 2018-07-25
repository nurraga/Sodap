<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
<head>
<title>SODAP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="//www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content=<?php echo base_url('../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg') ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content=<?php echo base_url('../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg') ?>">
   
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css" rel="stylesheet') ?>">
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css" rel="stylesheet') ?>">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css" rel="stylesheet') ?>">
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url('assets/css/font-awesome.css" rel="stylesheet') ?>">
    <link href="<?php echo base_url('assets/css/google-roboto-300-700.css" rel="stylesheet') ?>">

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../dashboard.html"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="limiter">
		
        <div class="full-page login-page" filter-color="white" data-image=<?php echo base_url('assets/img/balai.jpg') ?>">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
			<?php echo form_open('Home/login', 'class="login100-form validate-form"');?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="#">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="blue">
                                        <h4 class="card-title">SODAP</h4>
                                        <div class="social-line">
                                            
                                        </div>
                                    </div>
                                    <p class="category text-center">
                                      
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group" type="text"> 
                                            <span class="input-group-addon">
                                                <i class="material-icons"><br><br>face</i>
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                                                <label class="control-label">Nip</label>
                                                <input type="text" class="form-control"  name="identity" id="identity">
                                            </div>
                                        </div>
                                    </div>
									<div class="card-content">
                                        <div class="input-group" data-validate = "Password is required">
                                            <span class="input-group-addon">
                                                <i class="material-icons"><br><br>lock_outline</i>
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-10" data-validate = "password is required">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" type="password" name="password"  id="password">
                                            </div>
                                        </div>
										 </div>
                                    
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Masuk</button>
                                    </div>
									  <?php echo form_close();?>
                                </div>
								
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            	
<!--===============================================================================================-->	
	<script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

        </div>
    </div>
</body>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
       
        <ul class="dropdown-menu">
            <li class="header-title">Background Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <div class="togglebutton switch-sidebar-image">
                        <label>
                            <input type="checkbox" checked="">
                        </label>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <p>Filters</p>
                    <div class="badge-colors pull-right">
                        <span class="badge filter active" data-color="black"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-rose" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
           <li class="header-title">Background Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url('assets/img/sidebar-1.jpg') ?>"> data-src="<?php echo base_url('assets/img/login.jpeg') ?>"> alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url('assets/img/sidebar-2.jpg') ?>"> data-src="<?php echo base_url('assets/img/lock.jpeg') ?>"> alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url('assets/img/sidebar-3.jpg') ?>"> data-src="<?php echo base_url('assets/img/header-doc.jpeg') ?>"> alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url('assets/img/sidebar-4.jpg') ?>">data-src="<?php echo base_url('assets/img/bg-pricing.jpeg') ?>"> alt="" />
                </a>
            </li>
            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-primary btn-block btn-fill">Buy Now!</a>
                </div>
                <div class="">
                    <a href="http://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">Get Free Demo</a>
                </div>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>
            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-twitter btn-round"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-social btn-facebook btn-round"><i class="fa fa-facebook-square"></i> &middot; 50</button>
            </li>
        </ul>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"> type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"> type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"> type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/material.min.js') ?>"> type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js') ?>"> type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js') ?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url('assets/js/chartist.min.js') ?>"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url('/assets/js/jquery.bootstrap-wizard.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js') ?>"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url('assets/js/jquery.sharrre.js') ?>"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js') ?>"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url('assets/js/jquery-jvectormap.js') ?>"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url('assets/js/nouislider.min.js') ?>"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="<?php echo base_url('assets/js/jquery.select-bootstrap.js') ?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url('assets/js/jquery.datatables.js') ?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url('assets/js/sweetalert2.js') ?>"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js') ?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url('assets/js/fullcalendar.min.js') ?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url('assets/js/jquery.tagsinput.js') ?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url('assets/js/material-dashboard.js') ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>