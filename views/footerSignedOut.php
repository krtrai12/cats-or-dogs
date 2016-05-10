        <footer id="footerMenuSignedOut">
            <!-- A footer for the website when you are signed out -->
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/index.php') echo 'class="active"'; ?>><a href="../index.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/signupController.php') echo 'class="active"'; ?>><a href="../signupController.php">SIGN UP</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/signinController.php') echo 'class="active"'; ?>><a href="../signinController.php">SIGN IN</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>