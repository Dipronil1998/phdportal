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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

    <!-- Select 2 cdn css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <!-- Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Guide
                            </h2>
                        </div>
                        <form class="body" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Guide Name</label>
                                            <input type="text" class="form-control" name="Guidename"
                                                placeholder="Enter Guide Name" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Guide Title</label>
                                            <input type="text" class="form-control" name="eventparno" placeholder="Enter No of Participans per event" />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                About Guide
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <textarea name="rule" id="tinymce">

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a type="button" class="btn btn-danger m-t-15 waves-effect" href="./ourguide.php">BACK</a>
                            <button type="submit" name="submit"
                                class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
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

    <!-- Autosize Plugin Js -->
    <script src="../plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- select 2 js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/forms/basic-form-elements.js"></script>

    <!-- TinyMCE -->
    <!-- <script src="../plugins/tinymce/tinymce.js"></script> -->

    <!-- Demo Js -->
    <!-- <script src="../js/demo.js"></script> -->
    <script src="https://cdn.tiny.cloud/1/7h1hciaferc0mp1254bxaed6r5va1j1jbm9ph54j2ow478jk/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

  
    <script>
    tinymce.init({
        selector: "textarea",
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: false,
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | charmap emoticons |  preview| insertfile table link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{
                title: 'My page 1',
                value: 'http://www.tinymce.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_list: [{
                title: 'My page 1',
                value: 'http://www.tinymce.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.moxiecode.com'
            }
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
        ],
        importcss_append: true,
        file_picker_callback: function(callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 300,
        // resize:false,
        image_caption: true,
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        encoding: 'html'
    });
    </script>
    <script>
    $(".multiple-select").select2({
        //maximumSelectionLength: 2
    });
    </script>
</body>

</html>

<?php
             if(isset($_POST['submit']))
              { 
                #Create table if not created
                if (!mysqli_query($conn, "DESCRIBE event_det")) {
                    $csql = "CREATE TABLE event_det (
                                    event_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    event_name varchar(50) NOT NULL,
                                    event_type varchar(50) NOT NULL,
                                    event_par_no varchar(10) NOT NULL,
                                    event_group varchar(50) NOT NULL,
                                    event_date varchar(50) NOT NULL,
                                    event_time varchar(10) NOT NULL,
                                    event_fees int(11) NOT NULL,
                                    event_rules longtext NOT NULL,
                                    event_image varchar(50) NOT NULL,
                                    coordinator_name varchar(50) NOT NULL,
                                    is_active TINYINT(4)
                                )";
                    $create = mysqli_query($conn, $csql);
                    if ($create) {
                        // echo "<script>window.location.href='otp.php';</script>";
                    } else {
                        echo "An error occured";
                    }
                }



                $sql=mysqli_query($conn,'SELECT * FROM event_det');
                $fileName      = $_FILES['f1']['name'];
                $fileExtension = pathinfo($_FILES["f1"]["name"], PATHINFO_EXTENSION);
                $fileType      = $_FILES['f1']['type'];
                $fileSize      = $_FILES['f1']['size']; //bytes
                $fileTmp       = $_FILES['f1']['tmp_name'];
                $rows=$sql->num_rows+1;
                $event_name=str_replace(' ', '_',$_POST['eventname']);
                
                $coordinator_name= join(",",$_POST['eventcoordinate']);
                // converter 24hr to 12hr
                $time=date("h:iA", strtotime($_POST['eventtime']));
                if ($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/png'){
                    if($fileSize<= 1000 * 500){
                        $fnm=$event_name.'_'.$rows.'.'.$fileExtension;
                        $dst="../images/event_images/".$fnm;
                        
                        #Creating a folder if not created
                        if (!file_exists("../images/event_images/")) {
                            mkdir("../images/event_images/");
                        }

                        move_uploaded_file($_FILES["f1"] ["tmp_name"],$dst);

                        $sql1=mysqli_query($conn,"
                            INSERT INTO event_det (event_name,event_type,event_par_no,event_group,event_date,event_time,event_fees,coordinator_name,event_image,event_rules,is_active) 
                            VALUES('$_POST[eventname]','$_POST[eventtype]','$_POST[eventparno]','$_POST[eventgroup]','$_POST[eventdate]','$time','$_POST[eventfees]','$coordinator_name','$fnm','$_POST[rule]',1)");
                        if($sql1){
                            echo '<script type="text/javascript">alert("Successfully Submitted");window.location="event.php";</script>';
                        }
                        else{
                            echo '<script type="text/javascript">alert("Failed");window.location="addevent.php";</script>';
                        }
                                
                    }else{
                        echo "
                        <script>
                        alert('Image is too large to Upload !Max Size:500KB');
                        </script>
                        ";
                    }
                }else{
                    echo "
                    <script>
                    alert('Only Image Files are Acceptable ');
                    </script>
                    ";
                }
                
              } 
?>