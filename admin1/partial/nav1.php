<nav>
    <h1><i class="fa fa-university" aria-hidden="true"></i> PhD PORTAL</h1>
    <div class="menu-toggle"></div>
    <div class="navigation" id="myTopnav">
        <a href="#"><i class="fa fa-edit" aria-hidden="true"></i> Change Password</a>
        <a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.menu-toggle').click(function() {
        $('.menu-toggle').toggleClass('active')
        $('.navigation').toggleClass('active')
    })
})
</script>