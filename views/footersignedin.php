        <footer id="footerMenuSignedIn">
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/mainController.php') echo 'class="active"'; ?>><a href="../mainController.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/profileController.php') echo 'class="active"'; ?>><a href="../profileController.php">PROFILE</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/findFriends.php') echo 'class="active"'; ?>><a href="../find.php">FIND FRIENDS</a></li>
                    <li><a href="../logout.php">LOG OUT</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>