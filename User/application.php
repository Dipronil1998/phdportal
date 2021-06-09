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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/partial/nav1.css">
    <title>Application Form</title>
</head>

<body>
    <?php include 'partial/nav1.php'; ?>
    <div class="row">Application Form</div>

    <div class="container">
        <?php
	        include("../config.php");
	        $obj=new database;
	        $row=$obj->fetchregdata($_SESSION['email']);
	        $arr=mysqli_fetch_array($row);
        ?>

        <form action="../server.php" method="post">
            <h3>Personal Details<span class="required"></h3>
            <hr>
            <div class="info">
                <label>Name</label>
                <select>
                    <option></option>
                    <option>Mr.</option>
                    <option>Ms.</option>
                    <option>Mrs.</option>
                </select>
                <input type="text" name="" value="<?php echo $arr['firstname']; ?>" readonly>
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
                <input type="radio" id="male" name="gender" class="gender" <?php if($arr['gender']=="male") echo "checked";?> value="male">
                <label for="male" style="width: 5%;">Male</label>
                <input class="gender" type="radio" id="female" name="gender" value="female" <?php if($arr['gender']=="female") echo "checked";?>>
                <label for="female" style="width: 7%;">Female</label>
                <input class="gender" type="radio" id="other" name="gender" value="other" <?php if($arr['gender']=="other") echo "checked";?>>
                <label for="other" style="width: 15%;display:inline;">Prefer Not To Say</label>
            </div>
            <div class="info">
                <label>D.O.B</label>
                <input type="date" value="<?php echo $arr[7]; ?>" readonly> 
            </div>
            <div class="info">
                <label>Father's Name</label>
                <input type="text" name="fathername">
            </div>
            <br>

            <h3>Permanent Address<span class="required"></span></h3>
            <hr>
            <div class="info">
                <label>Address</label>
                <input type="text" name="address" style="width: 60%;">
            </div>
            <div class="info">
                <label>City</span></label>
                <input type="text" name="city">
            </div>
            <div class="info">
                <label>Pincode</label>
                <input type="text" pattern="[0-9]{6}" maxlength="6" name="pin">
            </div>
            <div class="info">
                <label>State</label>
                <input type="text" name="state">
            </div>
            <div class="info">
                <label>Country</label>
                <select name="country" style="width:20%; font-size:16px;">
                    <option></option>
                    <option>India</option>
                </select>
            </div>
            <br>

            <h3>Education Qualifications<span class="required"></h3>
            <hr>

            <h4>10th Qualification</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="insti10">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="start10">
                <label class="dur">End Date</label>
                <input type="date" name="end10">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="board10">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="per10">
            </div>


            <br>
            <h4>12th Qualification</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="insti12">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="start12">
                <label class="dur">End Date</label>
                <input type="date" name="end12">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="board12">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="per12">
            </div>

            <br>
            <h4>Under Graduation</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="instigra">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="startgra">
                <label class="dur">End Date</label>
                <input type="date" name="endgra">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="boardgra">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="pergra">
            </div>

            <br>
            <h4>Post Graduation</h4>
            <div class="info">
                <label>Institute Name</label>
                <input type="text" name="instipo">
            </div>
            <div class="info">
                <label>Start Date</label>
                <input type="date" name="startpo">
                <label class="dur">End Date</label>
                <input type="date" name="endpo">
            </div>
            <div class="info">
                <label>Board/Council</label>
                <input type="text" name="boardpo">
            </div>
            <div class="info">
                <label>Percentage / CGPA</label>
                <input type="number" name="perpo">
            </div>

            <br>

            <h3>Upload Documents<span class="required"></h3>
            <hr>
            <table>
                <tr>
                    <td><label>10th Marksheets</label></td>
                    <td><input type="file" name=""></td>

                    <td><label>12th Marksheets</label></td>
                    <td><input type="file" name=""></td>
                </tr>
                <tr>
                    <td><label>Under Graduation Marksheet</label></td>
                    <td><input type="file" name="" multiple></td>

                    <td><label>Post Graduation Marksheet</label></td>
                    <td><input type="file" name="" multiple></td>
                </tr>
                <tr>
                    <td><label>Photo Upload</label></td>
                    <td><input type="file" name=""></td>

                    <td><label>Signature Upload</label></td>
                    <td><input type="file" name=""></td>
                </tr>
                <tr>
                    <td><label>Address Proof</label></td>
                    <td><input type="file" name=""></td>

                    <td><label>Proforma Upload</label></td>
                    <td><input type="file" name=""></td>
                </tr>
            </table>

            <br>
            <div class="info">
                <input type="checkbox"> &nbsp; I hereby declare that all the information given by me in this application
                is true and correct to the best of my knowledge and belief. I also note that if any of the above
                statements are found to be
                incorrect or false or any information or particulars have been suppressed or omitted there from, I am
                liable to be disqualified and my admission may be cancelled.
            </div>
            <br>
            <div class="button">
                <button type="button" class="btn btn-primary"
                    onclick="document.location='application.php'">Reset</button>
                <button class="btn btn-success" name="fullregister">Submit</button>
                <button type="button" class="btn btn-danger" onclick="document.location='portal.php'">Cancel</button>
            </div>
        </form>
    </div>
    <!-- <script>
    function myFunction() {
        var x = document.getElementById('myTopnav'); 
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }

    }
    </script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.menu-toggle').click(function() {
            $('.menu-toggle').toggleClass('active')
            $('.navigation').toggleClass('active')
        })
    })
    </script>
</body>

</html>