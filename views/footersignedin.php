        <footer id="footerMenuSignedIn">
            <!-- A footer for the website when you are signed in -->
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/mainController.php') echo 'class="active"'; ?>><a href="../mainController.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/profileController.php') echo 'class="active"'; ?>><a href="../profileController.php">PROFILE</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/findFriends.php') echo 'class="active"'; ?>><a href="../find.php">FIND FRIENDS</a></li>
                    <?php if ($_SESSION['admin'] == 1) {    $active = '';
                                                            if ($_SERVER['REQUEST_URI'] == '/admin.php') { $active = 'class="active"'; }
                                                            echo '<li ' . $active . ' ><a href="../admin.php">ADMIN</a></li>'; } ?>
                    <li><a href="../logout.php">LOG OUT</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>