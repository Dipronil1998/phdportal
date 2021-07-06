<?php 
    session_start();
    if(empty($_SESSION['admin_mail'])){
        header('location: ./signin.php');
        exit();
    }
    // include("../../connection/connection.php");
    include("config.php");
    $obj= new Database;
    $newapplication=$obj->newapplication();
    $totalstudent=$obj->totalstudent();
    $pendingstudent=$obj->pendingstudent();
    $totalguide=$obj->totalguide();
    $newguide=$obj->newguide();
    $totalsynopsis=$obj->totalsynopsis();
    $totalthesis=$obj->totalthesis();
    $pendingpayment=$obj->pendingpayment();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php include 'partials/nav.php'; ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include 'partials/leftslide.php'; ?>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL NEW APPLICATION</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $newapplication; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL STUDENTS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalstudent; ?>"
                                data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="content">
                            <div class="text">PENDING STUDENTS </div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $pendingstudent; ?>"
                                data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">visibility</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL GUIDE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalguide; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">apps</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SYNPOSIS SUBMIT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalsynopsis; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">labels</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL THESIS SUBMIT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalthesis; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                    <div class="info-box bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL GUIDE WHO ARE NOT REGISTER</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $newguide; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                    <div class="info-box bg-deep-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">fiber_new</i>
                        </div>
                        <div class="content">
                            <div class="text">PAYMENT PENDING</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $pendingpayment; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                    <div class="card">
                        <div class="header">
                            <h2>VIEW </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Email id</th>
                                            <th>Guide Name</th>
                                            <th>Synopsis</th>
                                            <th>Thesis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $row=$obj->viewsynopsis();
                                            $i=1;
                                            while($arr=mysqli_fetch_array($row)){
                                                if($arr['synopsis']!='' and $arr['thesis']!=''){
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $arr['email']; ?></td>
                                            <td><?php echo $arr['guide']; ?></td>
                                            <td><?php if($arr['synopsis']!=''){ ?> <a
                                                    href="../../<?php echo $arr['synopsis']; ?>">Click Here</a><?php } ?>
                                            </td>
                                            <td><?php if($arr['thesis']!=''){ ?> <a
                                                    href="../../<?php echo $arr['thesis']; ?>">Click Here</a><?php } ?>
                                            </td>
                                        </tr>
                                        <?php 
                                        } }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Widgets -->
                </div>
            </div>

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>