<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/logo_pyk.png') ?>" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_pyk.png') ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>SODAP | KOTA PAYAKUMBUH</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="<?php echo base_url('s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg') ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="<?php echo base_url('s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg') ?>">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="<?php echo base_url('s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg') ?>">
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css" rel="stylesheet') ?>">
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css" rel="stylesheet') ?>">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css" rel="stylesheet') ?>">
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url('assets/css/font-awesome.css" rel="stylesheet') ?>">
    <link href="<?php echo base_url('assets/css/google-roboto-300-700.css" rel="stylesheet') ?>">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="black" data-image=<?php echo base_url('assets/img/sidebar-1.jpg') ?>">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="sodap.payakumbuhkota.go.id" class="simple-text">
                    SODAP
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="sodap.payakumbuhkota.go.id" class="simple-text">
                    Ct
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url('assets/img/default-avatar.png')?>" />
                    </div>
                    <div class="info">
                         <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                   
									<span class="hidden-xs"><?php echo $this->ion_auth->user()->row()->first_name ?></span>
                                </a>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo base_url('Kasubag'); ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">content_paste</i>
                            <p>FORM
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('Kasubag/entri'); ?>">Generate PPTK</a>
                                </li>
                                
                            </ul>	
							
                        </div>
						<div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('Kasubag'); ?>">Cek Target Keuangan</a>
                                </li>
                                
                            </ul>	
							
                        </div>
						<div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('Kasubag'); ?>">Target Fisik</a>
                                </li>
                                
                            </ul>	
							
                        </div>
                    </li>
					
					 <li>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">grid_on</i>
                            <p>Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('Kasubag/list1'); ?>">LIST</a>
                                </li>
                            </ul>
                        </div>
                    </li>
					 
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                          
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">1</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">pesan baru</a>
                                    </li>
                                  
                                </ul>
                            </li>
							
                            <li>
                                
								 <li>
                        <a href="<?php echo base_url('Kasubag/logout'); ?>"><i class="fa fa-sign-out fa-lg"></i> Keluar</a>
                    </li>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
			<br></br>
			<br></br>
			<br></br>
			
			<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
        echo $contents;
        ?>
        <!-- /.content -->
    </div>
			
			
          
    </div>
	
	
	 
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js')?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/material.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js')?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url('assets/js/moment.min.js')?>"></script>

<!--  Plugin for the Wizard -->
<script src="<?php echo base_url('assets/js/jquery.bootstrap-wizard.js')?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url('assets/js/jquery.sharrre.js')?>"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js')?>"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url('assets/js/jquery-jvectormap.js')?>"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url('assets/js/nouislider.min.js')?>"></script>
<!--  Google Maps Plugin    -->
<script src="<?php echo base_url('assets/js/jquery.select-bootstrap.js')?>"></script>
<!-- Select Plugin -->
<script src="<?php echo base_url('assets/js/jquery.select-bootstrap.js')?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url('assets/js/jquery.datatables.js')?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url('assets/js/sweetalert2.js')?>"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url('assets/js/jquery.tagsinput.js')?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url('assets/js/material-dashboard.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- Pace -->
<script src="<?php echo base_url('assets/components/pace2/pace.min.js') ?>"></script>

<!-- Cpanel js -->

<!-- <script type="text/javascript">
    $(document).ready(function() {
    
        demo.initFormExtendedDatetimepickers();
    });
</script> -->


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>
