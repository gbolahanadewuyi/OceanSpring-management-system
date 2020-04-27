<!DOCTYPE html>
<html lang="en">
<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, OPTIONS");
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>dashboard/lite/images/image.png"> -->
    <title>Ocean spring</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- <script src="<?=base_url()?>dashboard/zinggrid-master/zinggrid.css" ></script> -->
    <!-- <script src="<?=base_url()?>dashboard/zinggrid-master/dist/zinggrid.min.js"></script> -->
    <script src="https://cdn.zinggrid.com/zinggrid.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.4.0/papaparse.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?=base_url()?>dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/plugins/iCheck/all.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url()?>dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2019.2.514/styles/kendo.material.mobile.min.css" />

    <!-- <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script> -->
    <!-- <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDmg8qJR4MbbPtCEbuKiTXDNvGxl60Gn2Y",
            authDomain: "techloft-myfreshword.firebaseapp.com",
            databaseURL: "https://techloft-myfreshword.firebaseio.com",
            projectId: "techloft-myfreshword",
            storageBucket: "techloft-myfreshword.appspot.com",
            messagingSenderId: "552220663689"
        };
        firebase.initializeApp(config);
    </script> -->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
 
    .fas {
        padding-right: 5px;
        font-size: 15px;
    }

    .blue {
        color: #2f89fc;
    }

    .gold {
        color: #f4b342;
    }

    .green {
        color: #4bbb8b;
    }

    .grey {
        color: #ccc;
    }

    .red {
        color: #ff5759;
    }

    zg-control-bar {
        display: block;
    }

    zg-row.confirmed {
        color: #2f89fc;
        font-weight: normal;
    }

    zg-row.dispatched {
        color: #f4b342;
        font-weight: normal;
    }

    zg-row.delivered {
        color: #4bbb8b;
        font-weight: normal;
    }

    zg-row.pending {
        color: #ff5759;
        font-weight: normal;
    }

    zg-watermark {
        display: none;
    }

    zg-foot zg-cell:nth-of-type(1),
    zg-foot zg-cell:nth-of-type(3) {
        background: #fffced;
        border-left: 1px solid #fff0a3;
    }
    </style>


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=base_url()?>admin/dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!-- <img class="logo-mini" src="https://myfreshword.com/dashboard/lite/images/image.png" alt="homepage" style="width: 100px" /> -->
                <span class="logo-mini"><b>O</b>CP</span>
                <!-- logo for regular state and mobile devices -->
                <!-- <img src="https://myfreshword.com/dashboard/lite/images/image.png" alt="homepage" style="width: 100px" class="logo-lg" /> -->
                <span class="logo-lg"><b>Oceanspring</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="<?=base_url()?>/dashboard/images/prof-pic.png" class="user-image" alt="User Image"> -->
                                <span class="hidden-xs" id=""><?php echo $name;?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?=base_url()?>dashboard/images/prof-pic.png" class="img-circle"
                                        alt="User Image" id="prof-pic">

                                    <p id="merchant-name">
                                        <?php echo $name;?>
                                        <small>Super Admin</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>

                                </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="javascript:void(0)" onclick="end_session()"
                                            class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url()?>/dashboard/images/prof-pic.png" id="prof-pic" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p id="merchant-name">John Doe</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div> -->