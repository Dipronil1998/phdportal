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
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/partial/nav1.css">

    <title>Application Form</title>
</head>

<body>
    <?php include 'partial/nav1.php'; ?>
    <div class="container">

        <p>Congratulation!!<br>
            Your application has been approved.<br>
            Go through the payment process.<br>
        <form action="paymentsubmit.php" method="post">
            <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $privatekey; ?>" data-amount="2000000" data-name="dipronil das"
                data-description="dipronil das" data-label="Pay Online" data-image="" data-currency="inr"
                data-email="d@gmail.com">
            </script> -->
            <input type="text" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
            <input type="button" class="btn btn-primary" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
        </form>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();
        var email = jQuery('#email').val();
        var phone = jQuery('#phone').val();
        jQuery.ajax({
            type: 'post',
            url: '../server.php',
            data: "amt=" + amt + "&email=" + email,
            success: function(result) {
                var options = {
                    "key": "rzp_test_hMIpPctB5bNr0U",
                    "amount": 5000 * 100,
                    "currency": "INR",
                    "name": "Phd Portal",
                    "prefill.email": email,
                    "prefill.contact": phone,
                    "description": "Test Transaction",
                    "image": "",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: '../server.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "synopsis.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
    </script>
</body>

</html>