        <footer id="footerMenuSignedOut">
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/home.php') echo 'class="active"'; ?>><a href="../index.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '../about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/signup.php') echo 'class="active"'; ?>><a href="../signupController.php">SIGN UP</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>