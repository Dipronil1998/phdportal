<?php 
// session_start();

// if (!isset($_SESSION['email'])) {
//     header('location:../portal.php');
// }

// if($_SESSION['approved']==0 and $_SESSION['payment']==0 and $_SESSION['profile']==0){
//     header('location:application.php');
// }
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
    <link rel="stylesheet" href="css/newapplicant.css">
    <link rel="stylesheet" href="css/partial/nav1.css">
    <title>Application Form</title>
</head>

<body>
    <?php include 'partial/nav1.php'; ?>
    <div class="container">

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Approved</th>
                <th>View Profile</th>
            </tr>
            <?php
                include("../config.php");
                $obj=new database;
                $row=$obj->viewapplicant();
                while($arr=mysqli_fetch_array($row)){
                    if($arr['is_profile']==1){
            ?>
            <tr>
                <td><?php echo $arr['firstname']; ?></td>
                <td><?php echo $arr['lastname']; ?></td>
                <td><?php echo $arr['email']; ?></td>
                <td><?php echo $arr['phone']; ?></td>
                <td>
                    <?php if($arr['is_approved'] == 0){ ?>
                    <a href="status.php?id=<?php echo $arr['id']?>"
                        onclick="return confirm('Do you want to change the status to approve?');">pending..</a>
                    <?php } ?>

                   

                </td>
                <td> <a href="newapplicantdetails.php?id=<?php echo $arr['id'] ?>" style="color:green">
                        <i class="fa fa-eye" aria-hidden="true"></i></a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>

</body>

</html>