<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png') ?>" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png') ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>SODAP | KOTA PAYAKUMBUH</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- Canonical SEO -->
  <link rel="canonical" href="http://sodap.payakumbuhkota.go.id" />
  <!--  Social tags      -->
  <meta name="keywords" content="kota payakumbuh, aplikasi kota payakumbuh, goverment kota payakumbuh, kominfo kota payakumbuh, aplikasi kominfo payakumbuh, dinas kominfo kota payakumbuh, sodap kota payakumbuh, payakumbuh sumatra barat, pemerintah kota payakumbuh, sodap, smart city kota payakumbuh, payakumbuh go online,kominfo kota payakumbuh sumatra barat">
  <meta name="description" content="Aplikasi pemerintahan Kota Payakumbuh, yang di kembangkan Dinas Kominfo Kota Payakumbuh.">
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Sodap | Kota Payakumbuh">
  <meta itemprop="description" content="Aplikasi pemerintahan Kota Payakumbuh, yang di kembangkan Dinas Kominfo Kota Payakumbuh">
  <meta itemprop="image" content="<?php echo base_url('assets/img/logobaru.png') ?>">
  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@ikyprima">
  <meta name="twitter:title" content="Sodap | Kota Payakumbuh">
  <meta name="twitter:description" content="Aplikasi pemerintahan Kota Payakumbuh, yang di kembangkan Dinas Kominfo Kota Payakumbuh.">
  <meta name="twitter:creator" content="@ikyprima">
  <meta name="twitter:image" content="<?php echo base_url('assets/img/logobaru.png') ?>">
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url('assets/css/material-dashboard.css') ?>" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/google-roboto-300-700.css') ?>" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="<?php echo base_url('assets/img/sidebar-1.jpg')?>">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="<?php echo base_url() ?>" class="simple-text">
            SODAP | PYK
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="<?php echo base_url() ?>" class="simple-text">
            PYK
        </a>
    </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url('assets/img/faces/avatar.jpg')?>" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Tania Andrew
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="charts.html">
                            <i class="material-icons">timeline</i>
                            <p>Charts</p>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="material-icons">date_range</i>
                            <p>Calendar</p>
                        </a>
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
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- konten  -->
            <?php
            echo $contents;
            ?>
            <!-- batas konten -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/material.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js')?>"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url('assets/js/moment.min.js')?>"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
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
<!--<script src="<?php echo base_url('assets/js/jquery.select-bootstrap.js')?>"></script>-->
<!-- Select Plugin -->
<script src="<?php echo base_url('assets/js/jquery.select-bootstrap.js')?>"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url('assets/js/jquery.datatables.js')?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url('assets/js/sweetalert2.js')?>"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url('assets/js/jquery.tagsinput.js')?>"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url('assets/js/material-dashboard.js')?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/js/demo.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>
