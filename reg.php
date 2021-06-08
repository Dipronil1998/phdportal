<?php 
session_start();

if (isset($_SESSION['email'])) {
    header('location:User/yetapproved.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Welcome|Register</title>
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body onload="cap()">
    <div class="container">
        <div class="title">Registration</div>
        <form action="server.php" method="post" onsubmit="return validcap()">
            <div class="Registration">
                <div class="user">
                    <label class="details">First Name </label>
                    <input type="text" name="firstname" required>
                    <label class="details">Middle Name </label>
                    <input type="text" name="middlename">
                    <label class="details">Last Name </label>
                    <input type="text" name="lastname" required>

                </div>
                <div class="user">
                    <label>Email Id </label>
                    <input type="text" name='email1' required>
                    <label>@</label>
                    <select name='email2' required>
                        <option></option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="outlook.com">outlook.com</option>
                        <option value="outlook.com">yahoo.com</option>
                    </select>
                </div>
                <div class="user">
                    <label>Phone No</label>
                    <input type="text" name="phone" maxlength="10" pattern="[0-9]{10}" title="Please enter 10 digit number" required>
                </div>
                <div class="user gender">
                    <label>Gender</label>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" required>
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other" required>
                    <label for="other">Prefer Not To Say</label>
                </div>
                <div class="user">
                    <label>D.O.B</label>
                    <input type="date" name="dob" required>
                </div>
                <div class="user">
                    <label for="course">Courses Applied For:</label>
                    <select name="course" id="course">
                        <option value="course">Biochemistry</option>
                        <option value="course">Biophisics</option>
                    </select>
                </div>
                <div class="user">
                    <label>Password</label>
                    <input type="Password" name="password" required>
                </div>
                <div class="user">
                    <label> Confirm Password</label>
                    <input type="Password" name="cpassword" required>
                </div>
                <div class="user">
                    <label>Enter Capcha</label>
                    <input style="background-color:lightgray" type="text" id="capt" readonly>
                    <input type="text" id="textinput">
                    <h6>Captcha not visible? <i class="fas fa-redo-alt" onclick="cap()" style="cursor: pointer;"></i> to see Captcha</h6>
                </div>
                

                <div class="button">
                    <button class="btn btn-link" name="register" >Submit</button>
                    <button type="reset" class="btn btn-link" onclick="alert('Form has been Reset')">Reset</button>
                    <button type="button" class="btn btn-link" onclick="document.location='portal.php'">Cancel</button>
                    <div class="CS">
                        <p>Already have an account? <a href="signin.php">Sign in</a>.</p>
                    </div>

                </div>

            </div>
        </form>
    </div>
    <script type="text/javascript">
        function cap() {
            var alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e',
                'f', 'g', 'h', 'i',
                'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
            ];
            var a = alpha[Math.floor(Math.random() * 62)];
            var b = alpha[Math.floor(Math.random() * 62)];
            var c = alpha[Math.floor(Math.random() * 62)];
            var d = alpha[Math.floor(Math.random() * 62)];
            var e = alpha[Math.floor(Math.random() * 62)];
            var f = alpha[Math.floor(Math.random() * 62)];

            var final = a + b + c + d + e + f;
            document.getElementById("capt").value = final;
        }

        function validcap() {
            var stg1 = document.getElementById('capt').value;
            var stg2 = document.getElementById('textinput').value;
            if (stg1 == stg2) {
                return true;
            } else {
                alert("Please enter a valid captcha");
                return false;
            }
        }
    </script>
</body>

</html>