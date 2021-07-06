<?php 
    session_start();
    if(empty($_SESSION['admin_mail'])){
        header('location: ./signin.php');
        exit();
    }
    // include("../../connection/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Basic Form Elements | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

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

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="css/details.css" rel="stylesheet">

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
        <?php
	        include("config.php");
	        $obj=new database;
	        $row=$obj->showdetails($_GET['id']);
	        $arr=mysqli_fetch_array($row);
        ?>
        <form action="server.php" method="post" enctype="multipart/form-data">
            <h3>Personal Details<span class="required"></h3>
            <hr>
            <div class="info">
                <label>Name</label>
                <input type="text" name="firstname" value="<?php echo $arr['title']; ?>" readonly>
                <input type="text" name="firstname" value="<?php echo $arr['firstname']; ?>" readonly>
                <input type="text" name="" value="<?php echo $arr['middlename']; ?>" readonly>
                <input type="text" name="" value="<?php echo $arr['lastname']; ?>" readonly>

            </div>
            <div class="info">
                <label>Email Id</label>
                <input type="email" name="email" value="<?php echo $arr['email']; ?>" readonly>
                <label class="dur1">Alternative Email Id</label>
                <input type="email" name="alteremail">
            </div>
            <div class="info">
                <label>Phone No</label>
                <input type="text" pattern="[0-9]{10}" maxlength="10" value="<?php echo $arr['phone']; ?>" readonly>
                <label class="dur1">Alternative Phone No</label>
                <input type="text" pattern="[0-9]{10}" maxlength="10" name="alterphone">
            </div>
            <div class="info">
                <label>Gender</label>
                <input type="radio" id="male" name="gender" class="gender"
                    <?php if($arr['gender']=="male") echo "checked";?> value="male">
                <label for="male" style="width: 5%;">Male</label>
                <input class="gender" type="radio" id="female" name="gender" value="female"
                    <?php if($arr['gender']=="female") echo "checked";?>>
                <label for="female" style="width: 7%;">Female</label>
                <input class="gender" type="radio" id="other" name="gender" value="other"
                    <?php if($arr['gender']=="other") echo "checked";?>>
                <label for="other" style="width: 15%;display:inline;">Prefer Not To Say</label>
            </div>
            <div class="info">
                <label>D.O.B</label>
                <input type="date" value="<?php echo $arr['dob']; ?>" readonly>
            </div>
            <div class="info">
                <label>Father's Name</label>
                <input type="text" name="fathername" value="<?php echo $arr['fathername']; ?>">
            </div>
            <br>

            <h3>Permanent Address<span class="required"></span></h3>
            <hr>
            <div class="info">
                <label>Address</label>
                <input type="text" name="address" style="width: 60%;" value="<?php echo $arr['address']; ?>">
            </div>
            <div class="info">
                <label>City</span></label>
                <input type="text" name="city" value="<?php echo $arr['city']; ?>">
            </div>
            <div class="info">
                <label>Pincode</label>
                <input type="text" pattern="[0-9]{6}" maxlength="6" name="pin" value="<?php echo $arr['pin']; ?>">
            </div>
            <div class="info">
                <label>State</label>
                <input type="text" name="state" value="<?php echo $arr['state']; ?>">
            </div>
            <div class="info">
                <label>Country</label>
                <input type="text" name="state" value="<?php echo $arr['country']; ?>">
            </div>
            <br>

            <h3>Education Qualifications<span class="required"></h3>
            <hr>

            <h4>10th Qualification</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="insti10" value="<?php echo $arr['insti10']; ?>">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="start10" value="<?php echo $arr['start10']; ?>">
                <label class="dur">End Date</label>
                <input type="date" name="end10" value="<?php echo $arr['end10']; ?>">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="board10" value="<?php echo $arr['board10']; ?>">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="per10" value="<?php echo $arr['per10']; ?>">
            </div>


            <br>
            <h4>12th Qualification</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="insti12" value="<?php echo $arr['insti12']; ?>">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="start12" value="<?php echo $arr['start12']; ?>">
                <label class="dur">End Date</label>
                <input type="date" name="end12" value="<?php echo $arr['end12']; ?>">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="board12" value="<?php echo $arr['board12']; ?>">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="per12" value="<?php echo $arr['per12']; ?>">
            </div>

            <br>
            <h4>Under Graduation</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="instigra" value="<?php echo $arr['instigra']; ?>">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="startgra" value="<?php echo $arr['startgra']; ?>">
                <label class="dur">End Date</label>
                <input type="date" name="endgra" value="<?php echo $arr['endgra']; ?>">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="boardgra" value="<?php echo $arr['boardgra']; ?>">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="pergra" value="<?php echo $arr['pergra']; ?>">
            </div>

            <br>
            <h4>Post Graduation</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="instipo" value="<?php echo $arr['instipo']; ?>">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="startpo" value="<?php echo $arr['startpo']; ?>">
                <label class="dur">End Date</label>
                <input type="date" name="endpo" value="<?php echo $arr['endpo']; ?>">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="boardpo" value="<?php echo $arr['boardpo']; ?>">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="perpo" value="<?php echo $arr['perpo']; ?>">
            </div>

            <br>

            <h3>Upload Documents<span class="required"></h3>
            <hr>
            <table>
                <tr>
                    <td><label>10th Marksheets</label></td>
                    <td><a href="../../<?php echo $arr['mark10']; ?>">Click Here</a></td>

                    <td><label>12th Marksheets</label></td>
                    <td><a href="../../<?php echo $arr['mark12']; ?>">Click Here</a></td>
                </tr>
                <tr>
                    <td><label>Under Graduation Marksheet</label></td>
                    <td><a href="../../<?php echo $arr['markgra']; ?>">Click Here</a></td>

                    <td><label>Post Graduation Marksheet</label></td>
                    <td><a href="../../<?php echo $arr['markpo']; ?>">Click Here</a></td>
                </tr>
                <tr>
                    <td><label>Photo Upload</label></td>
                    <td><a href="../../<?php echo $arr['photo']; ?>">Click Here</a></td>

                    <td><label>Signature Upload</label></td>
                    <td><a href="../../<?php echo $arr['sign']; ?>">Click Here</a></td>
                </tr>
                <tr>
                    <td><label>Address Proof</label></td>
                    <td><a href="../../<?php echo $arr['addressp']; ?>">Click Here</a></td>

                    <td><label>Proforma Upload</label></td>
                    <td><a href="../../<?php echo $arr['proforma']; ?>">Click Here</a></td>
                </tr>
            </table>

            <br>
            <div class="button">
                <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>
            </div>
        </form>
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

    <!-- Ajax Js -->
    <script src="../js/event-ajax.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>