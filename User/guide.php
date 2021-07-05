<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:../portal.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" href="ps.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link
        href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Acme|Alegreya|Alegreya+Sans|Anton|Archivo|Archivo+Black|Archivo+Narrow|Arimo|Arvo|Asap|Asap+Condensed|Bitter|Bowlby+One+SC|Bree+Serif|Cabin|Cairo|Catamaran|Crete+Round|Crimson+Text|Cuprum|Dancing+Script|Dosis|Droid+Sans|Droid+Serif|EB+Garamond|Exo|Exo+2|Faustina|Fira+Sans|Fjalla+One|Francois+One|Gloria+Hallelujah|Hind|Inconsolata|Indie+Flower|Josefin+Sans|Julee|Karla|Lato|Libre+Baskerville|Libre+Franklin|Lobster|Lora|Mada|Manuale|Maven+Pro|Merriweather|Merriweather+Sans|Montserrat|Montserrat+Subrayada|Mukta+Vaani|Muli|Noto+Sans|Noto+Serif|Nunito|Open+Sans|Open+Sans+Condensed:300|Oswald|Oxygen|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Pacifico|Passion+One|Pathway+Gothic+One|Play|Playfair+Display|Poppins|Questrial|Quicksand|Raleway|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Ropa+Sans|Rubik|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Sedgwick+Ave|Sedgwick+Ave+Display|Shadows+Into+Light|Signika|Slabo+27px|Source+Code+Pro|Source+Sans+Pro|Spectral|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Work+Sans|Yanone+Kaffeesatz|Zilla+Slab|Zilla+Slab+Highlight"
        rel="stylesheet">
    <link rel="stylesheet" href="css/guide.css">
    <link rel="stylesheet" href="css/partial/nav1.css">

    <title>Guide</title>
</head>

<body>
    <?php include 'partial/nav1.php'; ?>

    <div class="container">
        <div class="info">
            <label>Your Guide is Ready?</label>
            <input type="radio" onclick="javascript:yesCheck();" name="guide" id="yesCheck">
            <label for="yesCheck" style="width: 5%;">Yes</label>
            <input type="radio" onclick="javascript:noCheck();" name="guide" id="noCheck">
            <label for="noCheck" style="width: 7%;">No</label>
        </div>
        <form action="../server.php" id="ifYes" method="post">
            <h1>Enter Guide details</h1>
            <div class="info">
                <label>Guide Name</label>
                <input type="text" name="name" value="">
            </div>
            <div class="info">
                <label>Title</label>
                <input type="text" name="title" value="">
            </div>
            <div class="info">
                <label>About Guide</label>
                <textarea name="about" rows="4" cols="50"></textarea>
            </div>
            <button class="btn btn-success" name="newguide">Submit</button>
        </form>
        <?php
	        include("../config.php");
	        $obj=new database;
	        $row=$obj->guideselect();
	        // $arr=mysqli_fetch_array($row);
        ?>
        <form action="../server.php" id="ifNo" method="post">
            <h1>Choose Your Own Guide</h1>
            <div class="info">
                <label>Guide Name</label>
                <select name="name" id="guide">
                    <option></option>
                    <?php
                        while($arr=mysqli_fetch_array($row)){
                            if($arr['own']==1 and $arr['count']<7){
                    ?>
                        <option value="<?php echo $arr['name']; ?>"><?php echo $arr['name']; ?></option>
                    <?php } } ?>
                </select>
            </div>
            <?php  ?>
            <div class="info">
                <label>Title</label>
                <input type="email" name="text" value="<?php echo $arr['name']; ?>">
            </div>
            <div class="info">
                <label>About Guide</label>
                <textarea name="" rows="4" cols="50"></textarea>
            </div>
            <?php  ?>
            <button class="btn btn-success" name="ourguide">Submit</button>
        </form>
    </div>
    <script>
    function yesCheck() {
        if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.visibility = 'visible';
            document.getElementById('ifNo').style.visibility = 'hidden';
        } else {
            document.getElementById('ifYes').style.visibility = 'hidden';
            document.getElementById('ifNo').style.visibility = 'visible';
        }
    }

    function noCheck() {
        if (document.getElementById('noCheck').checked) {
            document.getElementById('ifNo').style.visibility = 'visible';
            document.getElementById('ifYes').style.visibility = 'hidden';
        } else {
            document.getElementById('ifNo').style.visibility = 'hidden';
            document.getElementById('ifYes').style.visibility = 'visible';
        }
    }

    </script>
    
    <script>
    // $(document).ready(function(){
    //     jQuery('#guide').change(function(){
    //         var id=jQuery(this).val();
    //         jQuery.ajax({
    //             type:'post',
    //             url:'getguide.php',
    //             data:id,
    //             success:function(result){
    //                 alert(result);
    //             }
    //         })
    //     })
    // })
    </script>
</body>

</html>