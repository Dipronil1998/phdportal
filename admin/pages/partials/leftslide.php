<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="../images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
            <div class="email"><?php echo $_SESSION['admin_mail']; ?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li><a href="signout.php"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="../index.php">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="../pages/viewapplication.php">
                    <i class="material-icons">text_fields</i>
                    <span>New Application</span>
                </a>
            </li>
            <li>
                <a href="../pages/viewuser.php">
                    <i class="material-icons">account_circle</i>
                    <span>Student</span>
                </a>
            </li>
            <li>
                <a href="../pages/viewasynopsis.php">
                    <i class="material-icons">assessment</i>
                    <span>View Synopsis & Thesis</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person</i>
                    <span>Guide</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="../pages/ourguide.php">Our Guide</a>
                    </li>
                    <li>
                        <a href="../pages/newguide.php">New Guide</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="../pages/viewapplication.php">
                    <i class="material-icons">school</i>
                    <span>Deputy Registrar</span>
                </a>
            </li>
            <li>
                <a href="../pages/viewapplication.php">
                    <i class="material-icons">school</i>
                    <span>Registrar</span>
                </a>
            </li>
            <li>
                <a href="../pages/viewapplication.php">
                    <i class="material-icons">school</i>
                    <span>Vice Chancellor</span>
                </a>
            </li>
            <li class="header">System</li>
            <li>
                <a href="">
                    <i class="material-icons">settings</i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="signout.php">
                    <i class="material-icons">input</i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>